<?php
        if(is_dir('./__inc')){
            include '__inc/comptoirdb.php';
			// include '__inc/note/comptoirdb.class.php';
            include '__inc/functions/StringMb.php';
            include '__inc/functions/SHA256.php';
            //include_once "__inc/functions/fonctions.php";
        }
        elseif(is_dir('./../__inc')){
            include '../__inc/comptoirdb.php';
			// include '../__inc/note/comptoirdb.class.php';

            include '../__inc/functions/StringMb.php';
            include '../__inc/functions/SHA256.php';
            //include_once "../__inc/functions/fonctions.php";
        }
        else{
            include '../../__inc/comptoirdb.php';
			// include '../../__inc/note/comptoirdb.class.php';
            include '../../__inc/functions/StringMb.php';
            include '../../__inc/functions/SHA256.php';
            //include_once "../../__inc/functions/fonctions.php";
        }
	$GLOBALS['site_parameters']['sha256_encoding_salt']="k)I8#;z=TIxnXmIPdW2TRzt4Ov89|#V~cU@]";
	$GLOBALS['disable_login_by_privilege']=array('load', 'newsletter', 'stop', 'stand');
	
	/**
	 * microtime_float()
	 *
	 * @return
	 */
	function microtime_float()
	{
		return array_sum(explode(' ', microtime()));
	}
	/**
	 * Création d'un mot de passe crypté
	 *
	 * @return
	 */
	function unique_id()
	{
		mt_srand(microtime_float() * 1000000);
		return substr(sha256($GLOBALS['site_parameters']['sha256_encoding_salt'] . mt_rand(0, 9999999)), 0, 32);
	}

		/**
	 * Variable blanche
	 * if $var n'est pas défini, retourne $default, sinon retourne $var
	 *
	 * @param mixed $var
	 * @param string $default
	 * @return
	 */
	function vb(&$var, $default = null)
	{
		return isset($var) ? $var : $default;
	}

	/**
	 * Variable nulle
	 * if $var n'est pas défini, retourne $default, sinon retourne $var
	 *
	 * @param mixed $var
	 * @param integer $default
	 * @return
	 */
	function vn(&$var, $default = 0)
	{
		return isset($var) ? $var : $default;
	}
	/**
	 * get_user_password_hash()
	 *
	 * @param string $password
	 * @param string $tested_hash
	 * @param boolean $password_given_as_first_password_hash
	 * @param integer $password_length_if_given_as_first_password_hash
	 * @return
	 */
	function get_user_password_hash($password, $tested_hash = null, $password_given_as_first_password_hash = false, $password_length_if_given_as_first_password_hash = null)
	{
		if ($tested_hash == md5($password)) {
			// Pour des raisons de compatibilité avec les données d'anciens sites PEEL dont version < 6.0, on teste aussi si le md5 fonctionne
			// En termes de sécurité, cette compatibilité n'induit pas de faille particulière sur les nouveaux comptes, mais bien évidemment
			// continuer à utiliser d'anciens mots de passe encodés ne permet pas de bénéficier de la sécurité accrue dans les version >=6.0.
			return $tested_hash;
		}
		if (!$password_given_as_first_password_hash) {
			// Création d'un premier hash du mot de passe
			$first_password_hash = sha256(vb($GLOBALS['site_parameters']['sha256_encoding_salt']) . $password);
			// set where salt will appear in hash
			$salt_start = StringMb::strlen($password);
		} else {
			$first_password_hash = $password;
			$salt_start = $password_length_if_given_as_first_password_hash;
		}
		// if no salt given create random one
		if ($tested_hash == null) {
			$salt_hash = StringMb::substr(sha256(vb($GLOBALS['site_parameters']['sha256_encoding_salt']) . uniqid(mt_rand(), true)), 0, 6);
		} else {
			$salt_hash = StringMb::substr($tested_hash, 0, 6);
		}
		// add salt into text hash at pass length position and hash it
		if ($salt_start > 0 && $salt_start < StringMb::strlen($salt_hash)) {
			$first_password_hash_start = StringMb::substr($first_password_hash, 0, $salt_start);
			$first_password_hash_end = StringMb::substr($first_password_hash, $salt_start, strlen($salt_hash));
			$hash_rough = sha256(vb($GLOBALS['site_parameters']['sha256_encoding_salt']) . $first_password_hash_end . $salt_hash . $first_password_hash_start);
		} elseif ($salt_start > (strlen($salt_hash) - 1)) {
			$hash_rough = sha256(vb($GLOBALS['site_parameters']['sha256_encoding_salt']) . $first_password_hash . $salt_hash);
		} else {
			$hash_rough = sha256(vb($GLOBALS['site_parameters']['sha256_encoding_salt']) . $salt_hash . $first_password_hash);
		}
		// put salt at front of hash
		$password_hash = $salt_hash . StringMb::substr($hash_rough, 0, 26);
		if (empty($tested_hash) || $tested_hash == $password_hash) {
			return $password_hash;
		} else {
			return false;
		}
	}
	function MDP($chrs = 8)
	{
		$pwd = "";
		mt_srand(microtime_float() * 1000000);
		while (StringMb::strlen($pwd) < $chrs) {
			$chr = chr(mt_rand(0, 255));
			// on évite les 1, i, I, o, O et 0
			if (preg_match("/^[a-hj-km-np-zA-HJ-KM-NP-Z2-9]$/i", $chr)) {
				$pwd = $pwd . $chr;
			}
		}
		return $pwd;
	}
	/**
	 * Calcule la réduction générale applicable à un utilisateur et garde la valeur en session pour accélérer en cas de formule complexe
	 *
	 * @return
	 */
	function get_current_user_promotion_percentage()
	{
		if(empty($_SESSION['session_utilisateur']['calculated_promotion_percentage'])) {
			$percent_remise_groupe = 0;
			if (!empty($_SESSION['session_utilisateur']) && !empty($_SESSION['session_utilisateur']['id_groupe']) && check_if_module_active('groups')) {
				// Gestion des remises par groupes d'utilisateurs
				$sqlGroupe = "SELECT remise
					FROM peel_groupes
					WHERE id = '" . intval(vn($_SESSION['session_utilisateur']['id_groupe'])) . "' AND  " . get_filter_site_cond('groupes') . "";
				$resGroupe = query($sqlGroupe);
				if ($Groupe = fetch_object($resGroupe)) {
					$percent_remise_groupe = $Groupe->remise;
				}
			}
			$user_specific_discount = vn($_SESSION['session_utilisateur']['remise_percent']);
			if(!empty($GLOBALS['site_parameters']['group_and_user_discount_cumulate_disable'])) {
				$_SESSION['session_utilisateur']['calculated_promotion_percentage'] = max($user_specific_discount, $percent_remise_groupe);
			} else {
				$_SESSION['session_utilisateur']['calculated_promotion_percentage'] = (1 - (1 - $user_specific_discount / 100) * (1 - $percent_remise_groupe / 100)) * 100;
			}
		}
		return $_SESSION['session_utilisateur']['calculated_promotion_percentage'];
	}
    /**
     * Genera un archivo con las firmas md5 de los archivos del
     * directorio dado.
     * @param string $file
     * @return boolean
     */
    function getMD5Hashes($file = null){
        if(!isset($file)){
            $file = date('YmdHis').".md5";
        }
        $hashes = '';
        foreach ($this->_tree as $key => $value){
            $hashes .= $value." ".$key."\n";
        }
        return file_put_contents($file, $hashes);
    }
	/**
	 * user_login_now()
	 *
	 * @param string $email_or_pseudo
	 * @param string $mot_passe
	 * @param boolean $check_password
	 * @param boolean $password_given_as_first_password_hash
	 * @param mixed $password_length_if_given_as_first_password_hash
	 * @return
	 */
	function user_login_now($email_or_pseudo, $mot_passe, $check_password = true, $password_given_as_first_password_hash = false, $password_length_if_given_as_first_password_hash = null)
	{
		if (empty($_SESSION['session_login_tried'])) {
			$_SESSION['session_login_tried'] = 0;
		}
		$_SESSION['session_login_tried']++;
		if ($_SESSION['session_login_tried'] < 30) {
			// Limitation à 30 tentatives de login dans la même session
			$utilisateur = verifier_authentification(trim($email_or_pseudo), trim($mot_passe), null, $check_password, $password_given_as_first_password_hash, $password_length_if_given_as_first_password_hash);
			if ($utilisateur) {
				$_SESSION['session_utilisateur'] = $utilisateur;
				$_SESSION['session_ip'] = vb($_SERVER['REMOTE_ADDR']);
				$_SESSION['session_url'] = $_SERVER['HTTP_HOST'];
				if (!empty($_SESSION['session_caddie'])) {
					$_SESSION['session_caddie']->update(get_current_user_promotion_percentage());
				}
				if (!empty($_SESSION['session_utilisateur']['pays'])) {
					// Enregistrer la zone d'expedition de l'utilisateur
					$sqlUserZone = 'SELECT zone
						FROM peel_pays
						WHERE id="' . intval($_SESSION['session_utilisateur']['pays']) . '" LIMIT 1';
					if ($Zone = getOne($sqlUserZone)) {
					//if ($Zone = fetch_assoc($resUserZone)) {
						$_SESSION['session_utilisateur']['zoneId'] = $Zone['zone'];
					}
				}
				if (!empty($_SESSION['session_utilisateur']['devise'])) {
					set_current_devise($_SESSION['session_utilisateur']['devise']);
				}
				if (!empty($_SESSION['session_utilisateur']['site_country'])) {
					$_SESSION['session_site_country'] = intval($_SESSION['session_utilisateur']['site_country']);
				}
				// if (a_priv('admin*')) {
				// 	// On met à jour les appels de clients dont l'heure de cloture n'est pas précisée
				// 	// NB : On pourrait faire cela par cron plutôt qu'ici, mais sans cron c'est plus facilement gérable
				// 	updateTelContactNotClosed();
				// 	// On avertit le contact boutique du login d'un administrateur
				// 	$custom_template_tags['USER'] = $email_or_pseudo;
				// 	$custom_template_tags['REVERSE_DNS'] = gethostbyaddr(vb($_SERVER['REMOTE_ADDR']));
				// 	send_email($GLOBALS['support_sav_client'], '', '', 'admin_login', $custom_template_tags, null, $GLOBALS['support'], true, false, true, $GLOBALS['support']);
				// }
				// On enregistre la connexion de l'utilisateur
				if (!empty($_SESSION['session_utilisateur']['pseudo'])) {
					$user_pseudo = $_SESSION['session_utilisateur']['pseudo'];
				} else {
					$user_pseudo = $_SESSION['session_utilisateur']['email'];
				}

				// $bdd->execute('INSERT INTO peel_utilisateur_connexions (user_id, user_login, user_ip, date, site_id)
				// VALUES (' . intval($_SESSION['session_utilisateur']['id_utilisateur']) . ', "' . nohtml_real_escape_string($user_pseudo) . '", "' . ip2long(ipget()) . '", "' . date('Y-m-d H:i:s', time()) . '",  "' . intval($GLOBALS['site_id']) . '")');

				// query('INSERT INTO peel_utilisateur_connexions (user_id, user_login, user_ip, date, site_id)
				// 	VALUES (' . intval($_SESSION['session_utilisateur']['id_utilisateur']) . ', "' . nohtml_real_escape_string($user_pseudo) . '", "' . ip2long(ipget()) . '", "' . date('Y-m-d H:i:s', time()) . '",  "' . intval($GLOBALS['site_id']) . '")');

				$_SESSION['session_login_tried'] = 0;
			}
			return $utilisateur;
			var_dump($utilisateur);
		} else {
			return null;
			var_dump($utilisateur);
		}
	}

/**
 * On renvoie un tableau contenant les informations utilisateur si l'email et le mot de passe sont bons.
 * Sinon on renvoie false.
 *
 * @param string $email_or_pseudo
 * @param string $mot_passe
 * @param integer $user_id
 * @param boolean $check_password
 * @param boolean $password_given_as_first_password_hash
 * @param mixed $password_length_if_given_as_first_password_hash
 * @return
 */

function verifier_authentification($email_or_pseudo, $mot_passe, $user_id = null, $check_password = true, $password_given_as_first_password_hash = false, $password_length_if_given_as_first_password_hash = null)
{
	$requete = "SELECT *
	FROM ent_jal_utilisateurs
	WHERE etat=1";
	$requete.=" AND priv NOT IN ('".implode(',', array('load','newsletter', 'stop', 'stand'))."') AND ";
	$param='';
	if (!empty($email_or_pseudo)) {
		$requete .= "(email=:email OR pseudo=:pseudo)";
		$param=array(':email'=> $email_or_pseudo,':pseudo'=> $email_or_pseudo);
	} else {
		$requete .= "id_utilisateur=:user_id";
		$param=array(':user_id'=>intval($user_id));
	}
	$user_infos=fetch(prepare($requete,$param));
	if (!empty($user_infos) && (!$check_password || get_user_password_hash($mot_passe, $user_infos['mot_passe'], $password_given_as_first_password_hash, $password_length_if_given_as_first_password_hash))) {
		if(!$check_password && StringMb::strpos($user_infos['priv'], 'admin') === 0) {
			// Utilisateur avec droits d'administration, loggué via processus simplifié => on désactive les droits d'administration
			$user_infos['priv'] = 'util';
		}
		return $user_infos;
	} else {
		return false;
	}
}

////////////////////////////////////////////////////////////////////////////////////
if (!function_exists('ipGet')) {
	/**
	 * Cette fonction permet de retourner l'IP d'un utilisateur qu'on suppose être vraie. Attention, n'utiliser que pour évaluation du spam ou autres logs
	 * En effet, un utilisateur pourrait simuler HTTP_X_FORWARDED_FOR ou HTTP_CLIENT_IP plus facilement que REMOTE_ADDR
	 * ipGet a plus de chance d'être la vraie IP car on dépasse ainsi le REMOTE_ADDR de proxies, mais d'un autre côté on peut se faire berner
	 *
	 * @return
	 */
	function ipGet()
	{
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && isPublicIP($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} elseif (isset($_SERVER['HTTP_CLIENT_IP']) && isPublicIP($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (isset($_SERVER['REMOTE_ADDR'])) {
			$ip = $_SERVER['REMOTE_ADDR'];
		} else {
			$ip = 'undefined';
		}
		if (strpos($ip, ',') !== false) {
			$ip_array = explode(',', $ip);
			$ip = $ip_array[0];
		}
		return $ip;
	}
}

/**
 * Retourne la condition SQL permettant de filtrer les données pour une table
 *
 * @param string $table_technical_code	Nom de la table sans prefix.
 * @param string $table_alias Alias de la table
 * @param boolean $use_admin_rights Ne renvoyer que les éléments qu'on peut éditer avec les droits d'administrateur en cours
 * @param integer $specific_site_id	Id du site concerné
 * @param boolean $exclude_public_items	Exclue les résultats concernant la configuration générique
 * @param boolean $admin_force_multisite_if_allowed
 * @return
 */
function get_filter_site_cond($table_technical_code, $table_alias = null, $use_admin_rights = false, $specific_site_id = null, $exclude_public_items = false, $admin_force_multisite_if_allowed = false) {
	if($table_technical_code == '') {
		// Pour certaine table, le champ qui contient l'id du site n'est pas site_id, mais id_ecom
		$field = 'id_ecom';
	} else {
		// Cas général
		$field = 'site_id';
	}
	if(in_array($table_technical_code, array('continents'))) {
		// Cette table n'est pas multisite.
		return 1;
	}
	if(!empty($GLOBALS['site_parameters']['multisite_disable'])) {
		// Désactivation du multisite pour accélérer les requêtes sur un site isolé
		return 1;
	}
	if(!empty($table_alias)) {
		// Utilise l'alias de la table comme préfix. L'alias de la table est défini dans la requête
		$prefix = word_real_escape_string($table_alias) . '.';
	} elseif($table_alias === null) {
		$prefix = 'peel_' . word_real_escape_string($table_technical_code) . '.';
	} else {
		// table sans prefix, dans la cas d'une interconnexion avec des scripts spécifiques qui ne respectent pas cette norme
		$prefix = '';
	}
	if ($specific_site_id !== null) {
		// Utilise le site_id spécifié en paramètre, utile pour manipuler des données qui ne concernent pas le site qui exécute la page. $specific_site_id peut être égal à 0.
		$site_id = $specific_site_id;
	} else {
		if(empty($GLOBALS['site_id']) && defined('IN_CRON') && $use_admin_rights === false && $exclude_public_items === false) {
			// $GLOBALS['site_id'] est vide, et on ne cherche pas à avoir des droits d'administration particuliers
			// On est dans un cron, on veut gérer tous les sites en même temps sans avoir à charger la configuration de chaque site
			return 1;
		}
		// Utilise l'id du site en cours de consultation (cas général). $GLOBALS['site_id'] est défini au chargement du site
		$site_id = vn($GLOBALS['site_id']);
	}
	if (defined('IN_PEEL_ADMIN')) {
		if(isset($_SESSION['session_utilisateur']['site_id']) && $_SESSION['session_utilisateur']['site_id'] == 0) {
			// L'administrateur a les droits sur tous les sites
			if($admin_force_multisite_if_allowed) {
				// Lorsque l'ensemble des sites est concerné par la requête et pas seulement un site, ou que la configuration général, aucun filtre sur site_id ne doit être ajouté.
				return 1;
			} elseif(isset($_SESSION['session_admin_multisite']) && $specific_site_id === null) {
				if(intval($_SESSION['session_admin_multisite'])==0) {
					// on administre tous les sites en même temps
					return 1;
				} else {
					// on administre un autre site, d'après la préférence de l'administrateur mise en session
					$site_id = intval($_SESSION['session_admin_multisite']);
					if($use_admin_rights) {
						$exclude_public_items = true;
					}
				}
			}
		} elseif($specific_site_id === null) {
			// L'administrateur ne peut administrer que son propre site
			if($use_admin_rights) {
				$exclude_public_items = true;
			}
			if(((!est_identifie() || !isset($_SESSION['session_utilisateur']['site_id'])) && $site_id != vn($GLOBALS['site_id'])) || (est_identifie() && $_SESSION['session_utilisateur']['site_id'] != $site_id && $_SESSION['session_utilisateur']['site_id'] != 0)) {
				// problème de droit : sécurité, on empêche l'administrateur d'agir sur un site qui ne le concerne pas. Si l'administrateur est associé à site_id = 0, il peux administrer tous les sites, donc cette contrainte ne s'applique pas
				return 0;
			}
		}
	} elseif(!empty($site_id) && !empty($_SESSION['session_utilisateur']['site_id']) && $site_id != $_SESSION['session_utilisateur']['site_id'] && $site_id != vn($GLOBALS['site_id'])) {
		// Protection sur les site_id autorisés : sécurité, on empêche l'utilisateur d'agir sur un site qui ne le concerne pas
		return 0;
	} elseif(isset($_SESSION['session_site_country']) && !empty($GLOBALS['site_parameters']['site_country_allowed_array']) && in_array($table_technical_code, array('articles', 'marques', 'html', 'produits', 'vignettes_carrousels'))) {
		// Gestion de l'affichage de contenu spécifique en fonction du pays du visiteur. Cette fonction nécessite une mise en place spécifique en SQL et n'est pas standard.
		// Si pas dans un contexte d'administration de la donnée : ajout de la condition de le pays du visiteur 
		$cond_array[] = "FIND_IN_SET('" . real_escape_string($_SESSION['session_site_country']) . "', " . $prefix . "site_country)";
	}

	if($exclude_public_items) {
		// la requête concerne un seul site, sans tenir compte de la configuration global.
		$cond_array[] = $prefix.word_real_escape_string($field)."=".intval($site_id);
	} else {
		// Concerne un site, ou tous les sites
		$cond_array[] = $prefix.word_real_escape_string($field)." IN (0," . intval($site_id) . ")";
	}
	return implode(' AND ', $cond_array);
}
function word_real_escape_string($value){
	$value = StringMb::substr($value, 0, min(StringMb::strpos(str_replace(array('+', ',', ';', '(', ')', '!', '=', '`', '|', '&'), ' ', $value) . ' ', ' '), 60));
	return $value;
}	
function nohtml_real_escape_string($value){
	$value = StringMb::substr($value, 0, min(StringMb::strpos(str_replace(array('+', ',', ';', '(', ')', '!', '=', '`', '|', '&'), ' ', $value) . ' ', ' '), 60));
	return $value;
}

////////////////////////////////////////////////////////////
/////MONETICO///////////////
function hmac_sha1 ($key, $data)
{
    $length = 64; // block length for SHA1
    if (strlen($key) > $length) { $key = pack("H*",sha1($key)); }
    $key  = str_pad($key, $length, chr(0x00));
    $ipad = str_pad('', $length, chr(0x36));
    $opad = str_pad('', $length, chr(0x5c));
    $k_ipad = $key ^ $ipad ;
    $k_opad = $key ^ $opad;

    return sha1($k_opad  . pack("H*",sha1($k_ipad . $data)));
}

/**
 * Ajout d'un utilisateur
 *
 * @param array $frm Array with all fields data Array with all fields data
 * @param boolean $password_already_encoded
 * @param boolean $send_user_confirmation
 * @param boolean $warn_admin_if_template_active
 * @param boolean $skip_existing_account_tests
 * @return integer New user id
 */
function insere_utilisateur(&$frm, $password_already_encoded = false, $send_user_confirmation = false, $warn_admin_if_template_active = true, $skip_existing_account_tests = false)
{
	$date_insert=date("Y-m-d H:i:s");
	$date_update=date("Y-m-d H:i:s");
	// date_insert
	// , date_update
	// '" . nohtml_real_escape_string($date_insert) . "'
	// , '" . nohtml_real_escape_string($date_update) . "'
	$remise_percent=0;
	$password_hash=get_user_password_hash($frm['mot_passe']);
	$sql = "INSERT INTO ent_jal_utilisateurs (
		email
		, mot_passe
		, civilite
		, prenom
		, pseudo
		, nom_famille
		, telephone
		, portable
		, adresse
		, code_postal
		, ville
		, pays
		, newsletter
		, commercial
		, remise_percent
		, societe
		, intracom_for_billing
		, siret
		, fonction
		,connaissance_site
		,etat
	) VALUES (
		:email,
		:mot_passe,
		:civilite,
		:prenom,
		:pseudo,
		:nom_famille,
		:telephone,
		:portable,
		:adresse,
		:code_postal,
		:ville,
		:pays,
		1,
		1,
		0,
		:societe,
		'',
		'',
		:fonction,
		:connaissance_site,
		'1'
		)";

		$params=array(
	
			":email" => $frm['email'],
			":mot_passe" =>$password_hash,
			":civilite" =>$frm['civilite'],
			":prenom" =>$frm['prenom'],
			":pseudo" =>$frm['pseudo'],
			":nom_famille" =>$frm['nom_famille'],
			":telephone" =>$frm['telephone'],
			":portable" =>$frm['portable'],
			":adresse" =>$frm['adresse'],
			":code_postal" =>$frm['code_postal'],
			":ville" =>$frm['ville'],
			":pays" =>$frm['pays'],
			":societe" =>$frm['societe'],
			":fonction" =>$frm['fonction'],
			":connaissance_site" => $frm['connaissance_site']
		);
		prepare($sql,$params);

	$clientid=insertId();
	// if (check_if_module_active('wanewsletter')) {
	// 	insere_wa_utilisateur($frm);
	// }
	$code_client = "CLT_ENT" . date("Y") .insertId();
	
	query("UPDATE ent_jal_utilisateurs
		SET code_client = '" . nohtml_real_escape_string($code_client) . "'
		WHERE id_utilisateur = '" . intval($clientid)."'");

		user_login_now($frm['email'],$frm['mot_passe']);
	return $clientid;
}
function moneyformat($nombre){
	return number_format($nombre, 2, ',', ' ')." €";
}
function imgCheck($imgLink){
	$lien="https://www.comptoirdutuning.fr/upload/".$imgLink;
	if(@getimagesize($imgLink)){
		echo $imgLink;
	}
	elseif (@getimagesize($lien)) {
		echo $lien;
	}
	else{

		echo "produit_indispo.jpg";
	}
	
}
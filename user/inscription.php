<div class="h-100 h-custom gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="mb-5">
      <h3 class="h4 font-weight-bold text-theme">Inscription</h3>
      <p class="user_register_prevention">Merci de remplir le formulaire ci-dessous afin de pouvoir passer commande. Les champs marqués d'un astérisque * sont obligatoires. Nous ne vendons ou ne cédons pas à des tiers vos informations personnelles. Pour toute question concernant la protection des données personnelles vous pouvez consulter notre politique de confidentialité ou nous contacter par l'intermédiaire du <a href="contact" class="text-theme">formulaire de contact</a>.
          Le login peut servir à s'identifier, et sera utilisé pour le dépôt d'avis de produit.</p>
  </div>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <form method="post">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-6 bg-general-infos">
                  <div class="p-5">
                    <h3 class="fw-normal mb-5" style="color: ##343a40;">Informations personnelles</h3>

                    <div class="mb-4 pb-2">
                      <div class="row">
                          <label style="margin-right:5px;">Civilité :</label>
                          <input type="radio" id="civiliteMme" name="civilite" value="Mme"><label for="civiliteMme" style="margin:0 5px;">Mme</label>
                          <input type="radio" id="civiliteM" name="civilite" value="M."><label for="civiliteM" style="margin-left:5px;">M.</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <input type="text" id="nom_famille" name="nom_famille" class="form-control form-control-lg" required/>
                          <label class="form-label" for="nom_famille">Nom</label>
                        </div>

                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <input type="text" id="prenom" name="prenom" class="form-control form-control-lg" required/>
                          <label class="form-label" for="prenom">Prenom</label>
                        </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                          <div class="form-outline">
                          <input type="tel" id="telephone" name="telephone" class="form-control form-control-lg"/>
                          <label class="form-label" for="telephone">Téléphone</label>
                          </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                          <div class="form-outline">
                          <input type="tel" class="form-control form-control-lg" id="portable" name="portable" placeholder="" value="">
                          <label class="form-label" for="portable">Portable</label>
                          </div>
                      </div>
                      <div class="col-md-12 mb-12 pb-2">
                          <div class="form-outline">
                            <input type="text" id="pseudo" name="pseudo" class="form-control form-control-lg" required/>
                            <label class="form-label" for="pseudo">Pseudo</label>
                            <p><i>Le pseudo ne doit pas contenir le signe d'arobase (@)</i></p>
                          </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                          <div class="form-outline">
                          <input type="text" id="email" name="email" class="form-control form-control-lg" required/>
                          <label class="form-label" for="email">Email</label>
                          </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                          <div class="form-outline">
                            <input type="password" onkeyup="isGood(this.value)" minlength="8" maxlength="20" class="form-control form-control-lg" id="mot_passe" name="mot_passe" size="32" autocapitalize="none" value="" placeholder="********" required>
                            <label class="form-label" for="mot_passe" >Mot de passe</label>
                            <small class="help-block" id="password-text"></small>
                          </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                      <select class="form-control form-control-lg" id="fonction" name="fonction">
                        <option data-description="" value="">Choisissez...</option>
                        <option value="leader">Dirigeant / Indépendant</option>
                        <option value="manager">Manager / Cadre</option>
                        <option value="employee">Employé / Sans emploi</option>
                      </select>
                      <label for="fonction">Fonction</label>
                    </div>
                    <div class="col-md-6 mb-4 pb-2">
                          <div class="form-outline">
                          <input type="text" id="societe" name="societe" class="form-control form-control-lg" />
                          <label class="form-label" for="societe">Société</label>
                          </div>
                    </div>
                    <div class="col-md-12 mb-12 pb-2">
                          <div class="form-outline">
                          <input type="text" id="intracom_for_billing" name="intracom_for_billing" class="form-control form-control-lg" />
                          <label class="form-label" for="intracom_for_billing">N° TVA Intracom(Sociétés européennes uniquement)</label>
                          </div>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="col-lg-6 bg-contact text-white">
                  <div class="p-5">
                    <h3 class="fw-normal mb-5">Contact</h3>

                    <div class="mb-4 pb-2">
                      <div class="form-outline form-white">
                        <input type="text" id="adresse" name="adresse" class="form-control form-control-lg" />
                        <label class="form-label" for="adresse">Adresse</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5 mb-4 pb-2">

                        <div class="form-outline form-white">
                          <input type="text" class="form-control form-control-lg" id="code_postal" name="code_postal" value="" required/>
                            <label class="form-label" for="code_postal">Code Postale</label>
                        </div>

                      </div>
                      <div class="col-md-7 mb-4 pb-2">

                        <div class="form-outline form-white">
                          <input type="text" id="ville" name="ville" class="form-control form-control-lg" value="" required/>
                          <label class="form-label" for="ville">Ville</label>
                        </div>

                      </div>
                    </div>

                    <div class="mb-4 pb-2">
                      <div class="form-outline form-white">
                        <select class="form-control form-control-lg" id="pays" name="pays">
                          <option value="6">Allemagne</option>
                          <option value="10">Autriche</option>
                          <option value="11">Belgique</option>
                          <option value="13">Bulgarie</option>
                          <option value="103">Chypre</option>
                          <option value="21">Danemark</option>
                          <option value="27">Espagne</option>
                          <option value="110">Estonie</option>
                          <option value="28">Finlande</option>
                          <option value="1" selected="selected">France</option>
                          <option value="125">France - Guadeloupe</option>
                          <option value="115">France - Guyane</option>
                          <option value="160">France - Martinique</option>
                          <option value="163">France - Mayotte</option>
                          <option value="174">France - Nouvelle Calédonie</option>
                          <option value="116">France - Polynésie</option>
                          <option value="188">France - Réunion</option>
                          <option value="205">France - Saint-Pierre-et-Miquelon</option>
                          <option value="117">France - Terres australes</option>
                          <option value="229">France - Wallis et Futuna</option>
                          <option value="29">Grèce</option>
                          <option value="31">Hongrie</option>
                          <option value="34">Irlande</option>
                          <option value="36">Italie</option>
                          <option value="145">Lettonie</option>
                          <option value="150">Lituanie</option>
                          <option value="151">Luxembourg</option>
                          <option value="158">Malte</option>
                          <option value="47">Pays-Bas</option>
                          <option value="49">Pologne</option>
                          <option value="51">Portugal</option>
                          <option value="53">Roumanie</option>
                          <option value="54">Royaume-Uni (UK)</option>
                          <option value="200">Slovaquie</option>
                          <option value="201">Slovénie</option>
                          <option value="57">Suède</option>
                          <option value="52">Tchèque (Rep.)</option>
                        </select>
                        <label class="form-label" for="pays">Pays</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12 mb-12 pb-2">
                        <div class="form-outline form-white">
                          <select class="form-control form-control-lg" id="connaissance_site" name="connaissance_site" onchange="origin_change(this.value, new Array(5,7))">
                            <option value="">Choisissez...</option>
                            <option value="1">Par un ami ou parent</option>
                            <option value="2">Par un moteur de recherche</option>
                            <option value="3">Sur un comparateur de prix</option>
                            <option value="4">Sur un autre site Internet</option>
                            <option value="5">Par un de nos agents commerciaux</option>
                            <option value="6">Sur un salon</option>
                            <option value="7">Autre</option>
                          </select>
                          <label for="connaissance_site">Comment avez vous connu le site</label>
                        </div>

                      </div>
                    </div>
                    <div class="form-check d-flex justify-content-start mb-4 pb-3">
                      <input class="form-check-input me-3" type="checkbox" id="newsletter" name="newsletter" value="1" checked="checked">
                      <label class="form-check-label text-white" for="newsletter">
                        Oui, je souhaite être abonné à la newsletter de entraxe jantes alu
                      </label>
                    </div>
                    <div class="form-check d-flex justify-content-start mb-4 pb-3">
                      <input class="form-check-input me-3" type="checkbox" id="commercial" name="commercial" value="1" checked="checked">
                      <label class="form-check-label text-white" for="commercial">
                        J'accepte de recevoir sur mon adresse email des informations sur les mises à jour, les offres de entraxe jantes alu ainsi que des offres promotionnelles adressées par des partenaires de entraxe jantes alu.
                      </label>
                    </div>
                    <div class="g-recaptcha" data-sitekey="CLEF SITE"></div>
                    <button type="submit" name="submit" value="ok" class="btn btn-light btn-lg"
                      data-mdb-ripple-color="dark">Inscription</button>

                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <p><i>Conformément à la loi Informatique et Libertés du 06/01/78, les informations recueillies via ce formulaire peuvent donner lieu à l'exercice d'un droit d'accès, de modification, de rectification et de suppression en ligne dans la rubrique "Changer mes paramètres".</i></p>

    </div>
  </div>
  
</div>

<style>
    /* @media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
} */
.card-registration .select-input.form-control[readonly]:not([disabled]) {
    font-size: 1rem;
    line-height: 2.15;
    padding-left: .75em;
    padding-right: .75em;
}
.card-registration .select-arrow {
    top: 13px;
}

.bg-contact {
    background-color: #6c757d;
}
@media (min-width: 992px) {
    .card-registration-2 .bg-contact {
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
    }
}
@media (max-width: 991px) {
    .card-registration-2 .bg-contact {
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    }
}
.progress-bar {
  border-radius: 5px;
}
</style>
<?php
  if(isset($_POST['submit']) && $_POST['submit']=="ok"){
    $user=array(
      "email"=>$_POST['email'] ,
      "mot_passe"=>$_POST['mot_passe'] ,
      "civilite"=>$_POST['civilite'] ,
      "prenom"=>$_POST['prenom'] ,
      "pseudo"=>$_POST['pseudo'] ,
      "nom_famille"=>$_POST['nom_famille'] ,
      "telephone"=>$_POST['telephone'] ,
      "portable"=>$_POST['portable'] ,
      "adresse"=>$_POST['adresse'] ,
      "code_postal"=>$_POST['code_postal'] ,
      "ville"=>$_POST['ville'] ,
      "pays"=>$_POST['pays'] ,
      "newsletter"=>$_POST['newsletter'] ,
      "commercial"=>$_POST['commercial'] ,
      "intracom_for_billing"=>$_POST['intracom_for_billing'] ,
      "connaissance_site"=>$_POST['connaissance_site'] ,
      "fonction"=>$_POST['fonction'] ,
      "societe"=>$_POST['societe']
    );
    insere_utilisateur($user);
  }
?>
<script>
  function isGood(password) {
      var password_strength = document.getElementById("password-text");

      //TextBox left blank.
      if (password.length == 0) {
        password_strength.innerHTML = "";
        return;
      }

      //Regular Expressions.
      var regex = new Array();
      regex.push("[A-Z]"); //Uppercase Alphabet.
      regex.push("[a-z]"); //Lowercase Alphabet.
      regex.push("[0-9]"); //Digit.
      regex.push("[$@$!%*#?&]"); //Special Character.

      var passed = 0;

      //Validate for each Regular Expression.
      for (var i = 0; i < regex.length; i++) {
        if (new RegExp(regex[i]).test(password)) {
          passed++;
        }
      }

      //Display status.
      var strength = "";
      switch (passed) {
        case 0:
        case 1:
        case 2:
          strength = "<small class='progress-bar bg-danger' style='width: 40%'>Faible</small>";
          break; 
        case 3:
          if(password.length>=4 && password.length<8){
            strength = "<small class='progress-bar bg-warning' style='width: 60%'>Moyen</small>";
          }
          break;
        case 4:
          if(password.length>=8){
            strength = "<small class='progress-bar bg-success' style='width: 100%'>Fort</small>";
          }
          break;

      }
      password_strength.innerHTML = strength;

    }
</script>
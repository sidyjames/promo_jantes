<?php
class comptoirdb {
	
	private $conn;
	private $host;
	private $user;
	private $password;
	private $baseName;
	private $port;
	private $Debug;
	private $insertId;
    function __construct($params=array()) {
		$this->conn = false;
		$this->host = 'localhost'; //hostname
		$this->user = 'root'; //username
		$this->password = 'root'; //password
		$this->baseName = 'comptoirdu_mysql'; //name of your database
		$this->port = '3306';
		$this->debug = true;
		$this->connect();
	}
 
	function __destruct() {
		$this->disconnect();
	}
	
	function connect() {
		if (!$this->conn) {
			try {
				$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->baseName.'', $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));  
			}
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}
 
			if (!$this->conn) {
				$this->status_fatal = true;
				echo 'Connection BDD failed';
				die();
			} 
			else {
				$this->status_fatal = false;
			}
		}
		$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		return $this->conn;
	}
 
	function disconnect() {
		if ($this->conn) {
			$this->conn = null;
		}
	}
	function getOne($query) {
		$result = $this->conn->prepare($query);
		$ret = $result->execute();
		if (!$ret) {
		   echo 'PDO::errorInfo():';
		   echo '<br />';
		   echo 'error SQL: '.$query;
		   die();
		}
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$reponse = $result->fetch();
		
		return $reponse;
	}
	
	function getAll($query) {
		$result = $this->conn->prepare($query);
		$ret = $result->execute();
		if (!$ret) {
		   echo 'PDO::errorInfo():';
		   echo '<br />';
		   echo 'error SQL: '.$query;
		   die();
		}
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$reponse = $result->fetchAll();
		
		return $reponse;
	}
	
	public function execute($query) {
		$response = $this->conn->exec($query);
		return $response;
	}
	public function prepare($reqt,$params){
		$bdd=$this->conn;
		$sth=$this->conn->prepare($reqt, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		if(is_array($params)){
			foreach ($params as $key => &$value) {
				$sth->bindParam($key,$value);
			}
			$sth->execute();
			$this->insertId=$bdd->lastInsertId();
			$res=array($sth,$this->insertId);
			return $res;
		}
		return null;
	}
	// public function word_real_escape_string($value)
	// {
	// 	if (is_array($value)) {
	// 		foreach($value as $this_key => $this_value) {
	// 			$value[$this_key] = word_real_escape_string($this_value);
	// 		}
	// 	} 
	// 	else{
	// 		$value = StringMb::substr($value, 0, min(StringMb::strpos(str_replace(array('+', ',', ';', '(', ')', '!', '=', '`', '|', '&'), ' ', $value) . ' ', ' '), 60));
	// 	} 
	// 	// else {
	// 	// 	$value = null;
	// 	// }
	// 	return $value;
	// }

}
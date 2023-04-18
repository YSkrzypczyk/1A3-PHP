<?php

function helloWorld(){
	echo "Hello World !!!";
}


function cleanLastname($lastname){
	return strtoupper(trim($lastname));
}

function cleanFirstname($firstname){
	return ucwords(strtolower(trim($firstname)));
}

function cleanEmail($email){
	return strtolower(trim($email));
}


function connectDB(){
	//Se connecter à la BDD
	try{
		$connection = new PDO(DSN_DB,USER_DB,PWD_DB);
	}catch(Exception $e){
		//Si on arrive pas à se connecter alors on fait un die avec erreur SQL
		die("Erreur SQL ".$e->getMessage() );
	}

	return $connection;
}


function isConnected(){

	if( !empty($_SESSION['email'])  &&  !empty($_SESSION['login']) && $_SESSION['login']==1 ) {

		//Ok il a une session mais est ce que son email est encore dans
		//la bdd
		$connect = connectDB();
		$queryPrepared = $connect->prepare("SELECT id from skrzypczyk_user WHERE email=:email");
		$queryPrepared->execute(["email"=>$_SESSION['email']]);
		$result = $queryPrepared->fetch();

		if(!empty($result )){
			return true;
		}
	}

	return false;
}

function redirectIfNotConnected(){
	if(!isConnected){
		header("Location: login.php");
	}
}
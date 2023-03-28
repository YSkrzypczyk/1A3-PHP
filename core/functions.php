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
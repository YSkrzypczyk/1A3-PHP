<?php
session_start();
require "const.php";
require "functions.php";

//Objectif : Insertion du user en BDD

//Récupération des données
//Super globales
//-> elle commence toujours par $_ et en majuscule
//-> accessible dans tout le code
//-> créée et alimentée par le serveur
//-> toujours des tableaux

//print_r($_POST);
//Array ( [gender] => 0 [firstname] => Yves [lastname] => Skrzypczyk [email] => y.skrzypczyk@gmail.com [pwd] => gfdgfd [pwdConfirm] => gfdfgd [birthday] => 1986-11-29 [country] => fr [cgu] => on )


//Vérification macro : nb (9) + le nom des champs
if( count($_POST)!= 10 ||
	!isset($_POST["gender"]) ||
	empty($_POST["firstname"]) ||
	empty($_POST["lastname"]) ||
	empty($_POST["email"]) ||
	empty($_POST["pwd"]) ||
	empty($_POST["pwdConfirm"]) ||
	empty($_POST["birthday"]) ||
	empty($_POST["country"]) ||
	empty($_POST["cgu"])	||
	empty($_POST["captcha"])	

){
	die("Tentative de HACK !!!");
}


//Nettoyage des données
//->Firstname, Lastname, Email
$gender = $_POST["gender"];
$firstname = cleanFirstname($_POST["firstname"]);
$lastname = cleanLastname($_POST['lastname']);
$email = cleanEmail($_POST['email']);
$country = $_POST["country"];
$birthday = $_POST["birthday"];
$pwd = $_POST["pwd"];
$pwdConfirm = $_POST["pwdConfirm"];
$captcha = $_POST["captcha"];


$listOfErrors = [];
//Vérification des données	
//Gender -> 0, 1 ou 2
$listOfGenders = [0, 1, 2];
if( !in_array($gender, $listOfGenders) ){
	$listOfErrors[]="Ce genre n'existe pas";
}
//Firstname -> Min 2 caractères
if( strlen($firstname) < 2 ){
	$listOfErrors[]="Le prénom doit faire plus de 2 caractères";
}
//Lastname -> Min 2 caractères
if( strlen($lastname) < 2 ){
	$listOfErrors[]="Le nom doit faire plus de 2 caractères";
}


//Email -> Bon format
if( !filter_var($email, FILTER_VALIDATE_EMAIL)){
	$listOfErrors[]="L'email est incorrect";
}else{
	//Unicité de l'email
	$connection = connectDB();
	//Donne moi l'utilisateur dans la table skrzypczyk_user qui a pour email $email
	$queryPrepared = $connection->prepare("SELECT id FROM ".PRE_DB."user WHERE email=:email");
	$queryPrepared->execute(["email"=>$email]);
	$result = $queryPrepared->fetch();
	if(!empty($result)){
		$listOfErrors[]="L'email est déjà utilisé";
	}
}


//Country -> fr ou pl
$listOfCountries = ['fr','pl'];
if( !in_array($country, $listOfCountries) ){
	$listOfErrors[]="Ce pays n'existe pas";
}

//pwd -> 8 caractères avec min maj et chiffre
if( strlen($pwd) < 8 || !preg_match("#[a-z]#", $pwd) || !preg_match("#[A-Z]#", $pwd) || !preg_match("#[0-9]#", $pwd)

){

	$listOfErrors[]="Votre mot de passe doit faire au minimum 8 caractères avec minuscules, majuscules et chiffres.";
}

//pwdConfirm -> = pwd
if ($_POST["pwdConfirm"] != $_POST['pwd']) {

	$listOfErrors[]="Mot de passe de confirmation incorrect";
}


//Birthday -> entre 13 et 90
//la date est valide ? 1986-11-29
$dateExploded = explode("-", $_POST["birthday"]);
if ( !checkdate($dateExploded[1], $dateExploded[2], $dateExploded[0]) ){
		$listOfErrors[] = "Date de naissance incorrecte";
} else {

	$birthSecond = strtotime($_POST["birthday"]);
	$age = (time()-$birthSecond)/3600/24/365.25; 
	if ( $age < 13 || $age > 90){
			$listOfErrors[] = "Vous devez avoir entre 13 et 90 ans";
	}

}

if($captcha != $_SESSION['captcha']){
			$listOfErrors[] = "Le captcha est incorrect";
}


if( empty($listOfErrors) ){  

	//SI OK

	
	//Requete SQL pour inserer un nouvel utilisateur
	$queryPrepared = $connection->prepare("INSERT INTO ".PRE_DB."user 
			(firstname, lastname, email, gender, country, birthday, pwd) 
	VALUES (:firstname, :lastname, :email, :gender, :country, :birthday, :pwd )");

	//Executer cette requete
	$queryPrepared->execute([
		"firstname"=>$firstname,
		"lastname"=>$lastname,
		"email"=>$email,
		"gender"=>$gender,
		"country"=>$country,
		"birthday"=>$birthday,
		"pwd"=>password_hash($pwd, PASSWORD_DEFAULT),
	]);

	//Redirection sur la page de login
	header("Location: ../login.php");


}else{
	//SI NOK
	// --> Redirection sur le register avec les messages d'erreurs
	$_SESSION["errors"] = $listOfErrors;
	header("Location: ../register.php");
}
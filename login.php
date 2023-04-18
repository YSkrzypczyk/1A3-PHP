<?php
		session_start();
		require "core/const.php";
 		require "core/functions.php";	
 		include "template/header.php"; 
?>


<div class="container">
<h1>Se connecter</h1>
</div>

<?php
/*
Consigne du TP
	- Créer un formulaire HTML permettant de se connecter
	- Les données du formulaire devront être envoyées au fichier login.php
	- Vérification des données saisies
	- Affichages des erreurs dans une div alert (Bootstrap)
	- Dans le cas ou les données sont OK, créer une variable de SESSION contenant :
	----> email = ....
	----> login = 1
	- redirection sur la page index.php
*/

	if( !empty($_POST['email']) &&  !empty($_POST['pwd']) ){

		$email = cleanEmail($_POST['email']);
		$pwd  = $_POST['pwd'];

		$connect = connectDB();
		$queryPrepared = $connect->prepare("SELECT pwd FROM skrzypczyk_user WHERE email=:email");
		$queryPrepared->execute(["email"=>$email]);

		$result = $queryPrepared->fetch();

		if( !empty($result) && password_verify($pwd, $result["pwd"])){
			$_SESSION['email'] = $email;
			$_SESSION['login'] = 1;
			header("Location: index.php");
		}else{
			echo "Identifiants incorrects";
		}



	}


?>


<form action="login.php" method="POST">
	<input type="email" name="email" placeholder="email" required="required">
	<input type="password" name="pwd" placeholder="votre mot de passe" required="required">
	<button>Se connecter</button>
</form>


<?php include "template/footer.php" ?>
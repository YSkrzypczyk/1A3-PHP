<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Cours de PHP</title>
	<meta name="description" content="ma première page en PHP">
</head>
<body>

	<?php

		//Commentaire sur une ligne
		/*
			Variable :
			Convention : camelCase
			Anglais
			Logique et la compréhension
			Type : String, Boolean, Integer, Float, Null
			auto déclarée et auto typée
		*/
			/*
		$firstName = "Yves";
		$age = 36;
		$adult = true;
		$size = 1.96;
		$average = null;

		//Bonjour Yves, tu as 36 ans
		echo "<b>Bonjour</b> ".$firstName.", tu as ".$age." ans<br>";

		$x = 5;
		//Bonjour Yves, dans 5 an(s) tu auras 41 ans
		echo "Bonjour ".$firstName.", dans ".$x." an(s) tu auras ".($age+$x)." ans";
		*/


		//Opérateurs arithmétiques
		// + - / * %

		//Incrémentation et Décrémentation
		$cpt = 0;
		/*
		$cpt = $cpt + 1;
		$cpt += 1;
		$cpt++;
		++$cpt;
		*/
		/*
		echo $cpt; //0
		echo $cpt + 1; //1
		echo $cpt += 1; //1
		echo $cpt; //1
		echo $cpt = $cpt + 1;//2
		echo $cpt; //2
		echo $cpt++; //2
		echo $cpt; //3 
		echo ++$cpt; //4 
		echo $cpt; //4
		*/

		//Conditions
		//if elseif else
		//switch
		//ternaire
		//null coalescent

		// || => OR
		// && => AND
		/*
		$age = 101;
		
		if($age < 0 || $age > 100) echo "Menteur";
		elseif ($age > 18) echo "Majeur";
		elseif($age == 18) echo "Tout juste majeur"; 
		else echo "Mineur";	
		*/

		/*
		$role = "abonne";
		switch($role){
			case "admin":
				echo "Peut tout faire ";
				break;
			case "editeur":
				echo "Peut éditer le contenu ";
			default:
				echo "Peut consulter le site";
				break;
		}
		*/

		/*
		$adult = true;

		if($adult == true){
			echo "Adulte"; 
		}else {
			echo "Enfant";
		}
		//Condition ternaire 
		//même instruction et 1 seule instruction
		//Juste if et else
		//Syntaxe : instruction (condition)?vrai:faux;

		echo ($adult)?"Adulte":"Enfant";
		*/

		/*
		$average = null;

		if($average == null){
			echo "Pas encore de note";
		}else{
			echo $average;
		}

		echo ($average == null)?"Pas encore de note":$average;

		echo $average??"Pas encore de note";
		*/

		//Les boucles
		//While -> Une boucle avec un nombre d'itération inconnu
		//Do while ->  Une boucle avec au moins 1 itération
		//For ->  Une boucle avec un nombre d'itération connu
		//Foreach -> Pour les tableaux

		/*
		$dice = rand(1,100);
		$cpt = 1;
		while ($dice != 6) {
			$dice = rand(1,100);
			$cpt++;
		}
		echo $cpt." tentatives";
		$cpt = 0;
		do{
			$dice = rand(1,100);
			$cpt++;
		}while($dice != 6);
		echo $cpt." tentatives";
		*/
		
		//for(declaration; condition; evolution){
		/*
		for($cpt=2 ; $cpt<50 ; $cpt++){
			echo $cpt."<br>";
		}
		*/





		function isPrime($x){
			if($x < 2) {
				return false;
			}else{
				for($cpt=2; $cpt < $x; $cpt++){
					if($x % $cpt == 0){
						return false;
					}
				}
			}
			return true ;
		}



		// 2 3 5 7 11 13 ...

		//Afficher Vrai ou faux si un nombre est premier (5 pts)
		$x = 11;
		//echo (isPrime($x))?"Vrai":"Faux";
		

		//Afficher les nombres premiers entre 1 et 100 (10 pts)

		for($cpt=1; $cpt<=100; $cpt++){
			//echo (isPrime($cpt))?"<li>".$cpt:"";
		}


		//Afficher les $x premiers nombres premiers (5 pts)
		$x = 10;
		$number = 2;
		while ($x > 0) {

			if(isPrime($number)){
				$x--;
				//echo "<li>".$number;
			}
			$number++;
		}



		//Fonctions
		//camelCase
		//Anglais
		//Cohérent
		//Unique
		//Nom reservé

		function hello(){

			//echo "Bonjour";

		}

		//hello();


		function helloYou($firstname="", $lastname=""){

			//echo "Bonjour ".$firstname." ".$lastname;

		}

		helloYou("Yves", "SKRZYPCZYK");

		helloYou("Pierre");

		helloYou();





		function cleanAndCheckFirstname(&$firstname){
			//Suppression des espaces en debut et en fin
			//$firstname = trim($firstname);
			//tout en minuscule
			//$firstname = strtolower($firstname);
			//Premiere lettre de chaque mot en majuscule
			//$firstname = ucwords($firstname);

			$firstname = ucwords(strtolower(trim($firstname)));
			if(strlen($firstname) >2){
				return true;
			}else{
				return false;
			}
		}

		$firstname = "  yVES "; // "Jean Pierre";
		
		if(cleanAndCheckFirstname($firstname)){

			//INSERT INTO user (firstname) VALUES ($firstname);
		}
















	?>

</body>
</html>
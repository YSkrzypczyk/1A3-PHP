<?php


	//$student = array();
	$student = ["BOUFADEN", "Lyess", 13];

	//Lyess a 13 de moyenne
	//echo $student[1]." a ".$student[2]." de moyenne";


	//Ajouter une valeur à un tableau
	$student[] = "Fabio";

	//Lyess qui a pour second prénom Fabio a une moyenne de 13
	//echo $student[1]." qui a pour second prénom".$student[3]." a une moyenne de ".$student[2];


	$student = [
				12=>32,
				"lastname"=>"Pierre", 
				"firstname"=>"Michel",
				0=>18, 
				"average"=>15,
				4=>33,
			];
	//Afficher "Prénom NOM a une moyenne de 15"
	//echo $student["firstname"]." ".$student["lastname"]." a une moyenne de ".$student["average"]; 

	$student[]="ESGI";


	echo "<pre>";
	//print_r($student);
	//var_dump($student);
	echo "</pre>";


	//DIMENSION
	$student = ["pierre", "Michel", 12]; //1D

	$class =[ 
				0=>["pierre", "Michel", 12],
				1=>[0=>"pierre", 1=>"Michelle", 2=>13],
				2=>[["Pierre", "Abdelkader"], "Michel", 14]
			];//3D




	$array = [
				[],
				[
					[],
					[
						[
							[
								[],
								[
									[
										["yves"]
									]
								]
							]
						],
						[
							[]
						]
					]
				]
			]; //8D



	// FOREACH
	$fruits = [0=>"banane", "rouge"=>"tomate", "cerise"];
	foreach($fruits as $key=>$fruit){

		//echo "<li>".$key."=>".$fruit;

	}



$class = [
			["firstname"=>"Reda",["CC1"=>15,"CC2"=>16, "partiel"=>10]],
			["firstname"=>"Julien","CC1"=>14,"CC2"=>14, "partiel"=>12],
			["firstname"=>"Célian","CC1"=>14,"CC2"=>14, "partiel"=>4],
			["firstname"=>"Mike","CC1"=>12,"CC2"=>9, "partiel"=>13]
];

?>

<table border="1px">
	<tr>
		<th>Prénom</th>
		<th>Moyenne</th>
	</tr>

<?php

$averageMax = -1;
$averageMin = 21;
$bestStudent = null;
$worstStudent = null;

foreach ($class as $student) {
	//A la premier itération 
	//$student = ["firstname"=>"Reda","CC1"=>15,"CC2"=>16, "partiel"=>10]

	$average = ($student["CC1"]+$student["CC2"]+$student["partiel"])/3;

	if($average > $averageMax){
		$averageMax = $average;
		$bestStudent = $student["firstname"];
	}
	if($average < $averageMin){
		$averageMin = $average;
		$worstStudent = $student["firstname"];
	}

	echo "<tr> <td>".$student["firstname"]."</td>
		<td>".round($average, 2)."</td>
	</tr>";

	/*<tr>
		<td>Reda</td>
		<td>13.67</td>
	</tr>*/
}

?>
	

</table>

Le meilleur c'est <?php echo $bestStudent;?> et le pire c'est <?php echo $worstStudent;?>
<?php
		session_start();
 		include "template/header.php"; 
?>


<div class="container">
<h1>S'inscrire</h1>

<?php 
if( isset($_SESSION['errors'])) {
	$listOfErrors = unserialize($_SESSION['errors']);
	echo '<div class="alert alert-danger" role="alert">';
	foreach( $listOfErrors as $error){
			echo "<li>".$error;
	}
	echo "</div>";
	unset($_SESSION['errors']);
}
?>


<form action="core/userAdd.php" method="POST">

	<div class="mb-3">

		<input type="radio" class="form-check-input" id="gender0" name="gender" checked="checked" value="0">
		<label for="gender0">M.</label>
		
		<label>
			<input type="radio" class="form-check-input" name="gender" value="1">
			Mme.
		</label>

		<label>
			<input type="radio" class="form-check-input" name="gender" value="2">
			Autre
		</label>
	</div>


	<div class="mb-3">
		<label for="firstname" class="form-label">Votre prénom</label>
    	<input type="text" name="firstname" class="form-control" id="firstname" placeholder="John" required="required">
	</div>

	<div class="mb-3">
		<label for="lastname" class="form-label">Votre nom</label>
    	<input type="text" name="lastname" class="form-control" id="lastname" placeholder="Doe" required="required">
	</div>

	<div class="mb-3">
		<label for="email" class="form-label">Votre email</label>
    	<input type="email" name="email" class="form-control" id="email" placeholder="john.doe@gmail.com" required="required">
	</div>

	<div class="mb-3">
		<label for="pwd" class="form-label">Votre mot de passe </label>
    	<input type="password" name="pwd" class="form-control" id="pwd" required="required">
	</div>

	<div class="mb-3">
		<label for="pwdConfirm" class="form-label">Confirmation </label>
    	<input type="password" name="pwdConfirm" class="form-control" id="pwdConfirm" required="required">
	</div>

	<div class="mb-3">
		<label for="birthday" class="form-label">Date de naissance </label>
    	<input type="date" name="birthday" class="form-control" id="birthday" required="required">
	</div>

	<div class="mb-3">
		<label for="country" class="form-label">Pays de naissance </label>
    	<select name="country"  class="form-select">
    		<option value="fr">France</option>
    		<option value="pl">Pologne</option>
    	</select>
	</div>


	<div class="mb-3">
    	<input type="checkbox" class="form-check-input" name="cgu" id="cgu" required="required">

		<label for="cgu" required="required" class="form-label">J'accepte les CGUs </label>
	</div>	

	<button type="submit" class="btn btn-primary">S'inscrire</button>
</form>

</div>

<?php include "template/footer.php" ?>
<?php include "template/header.php" ?>

<div class="container">
<h1>S'inscrire</h1>

<form>

	<div class="mb-3">
		<label for="gender" class="form-label">Votre civilité</label>
    	<select class="form-control" id="gender">
    		<option>Mr.</option>
    		<option>Mme.</option>
    		<option>Autre</option>
    	</select>
	</div>


	<div class="mb-3">
		<label for="firstname" class="form-label">Votre prénom</label>
    	<input type="text" class="form-control" id="firstname">
	</div>

	<div class="mb-3">
		<label for="lastname" class="form-label">Votre nom</label>
    	<input type="text" class="form-control" id="lastname">
	</div>

	<div class="mb-3">
		<label for="email" class="form-label">Votre email</label>
    	<input type="email" class="form-control" id="email">
	</div>

	<div class="mb-3">
		<label for="pwd" class="form-label">Votre mot de passe </label>
    	<input type="password" class="form-control" id="pwd">
	</div>

	<div class="mb-3">
		<label for="pwdConfirm" class="form-label">Confirmation </label>
    	<input type="password" class="form-control" id="pwdConfirm">
	</div>

	<div class="mb-3">
		<label for="birthday" class="form-label">Date de naissance </label>
    	<input type="date" class="form-control" id="birthday">
	</div>


	<div class="mb-3">
    	<input type="checkbox" id="cgu">

		<label for="cgu" class="form-label">J'accepte les CGUs </label>
	</div>	

	<button type="submit" class="btn btn-primary">S'inscrire</button>
</form>

</div>

<?php include "template/footer.php" ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon site en PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
	  	<nav class="navbar navbar-expand-lg bg-primary">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="index.php">ESGI</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNav">
		      <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="contact.php">Contact</a>
		        </li>

		        <?php if(isConnected()){ ?>

							<li class="nav-item">
			          <a class="nav-link" href="users.php">Liste des utilisateurs</a>
			        </li>

							<li class="nav-item">
			          <a class="nav-link" href="logout.php">Se deconnecter</a>
			        </li>


		        <?php } else { ?>

							<li class="nav-item">
			          <a class="nav-link" href="register.php">S'inscrire</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="login.php">Se connecter</a>
			        </li>

		        <?php } ?>




		        



		        
		      </ul>
		    </div>
		  </div>
		</nav>


<?php
	session_start();
	require "core/const.php";
	require "core/functions.php";
	include "template/header.php"; 
?>


<div class="container">

<h1>Welcome</h1>
<h2><?php helloWorld(); ?></h2>

</div>

<?php include "template/footer.php"; ?>
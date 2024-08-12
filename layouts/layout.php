<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

<header>
	<?php 
	require 'controller/starterController.php';
	$is=new StarterController();
		require_once('header.php');
	?>	
</header>

<section>	
<div class="">

	  <?php                	  
	  // carga el archivo routing.php para direccionar a la página .php que se incrustará entre la header y el footer	  
	  require_once('routing.php');	
	  ?>

</div>

	   
</section>

<footer>
	<?php 
		include_once('footer.php');
	?>
</footer>

</body>
</html>
<?php
	session_start();
?>
<!	DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html  xmlns="http://www.w3.org/1999/xhtml">
	<head>

		<title>Mis Amigos</title>
		<script type="text/javascript" src="../jQuery/jquery-1.9.1.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
		<link rel="stylesheet" type="text/css" href="../css/menuStyles.css"/>
		<script src="../jQuery/1.10.3jquery-ui.js"></script>

		<script type="text/javascript">
		$(function() {
			$( "#menu" ).menu();
		  });
		$(function() {
			$( "#accordion" ).accordion();
		  });

		</script>
	</head>
	<body>
		<form action="" method="post" enctype="" onsubmit="">

			<?php include ('headerMenu.php'); ?>
	
			<?php include ('menu.php'); ?>
			
			<div class="buscarAmigos">
						
						<div class="busqueda">
							<input type="text" name="txtNombreAmigo" id="txtNombreAmigo"/>
						
							<input type="submit" name="btnBuscarMiAmigo" id="btnBuscarMiAmigo" value="Buscar" class="boton"/>
						</div>
					
					<?php 
							if(isset($_POST['btnBuscarMiAmigo']))
							{
								$like = "and (u.nombre like '%".$_POST['txtNombreAmigo']."%' or u.apellido like '%".$_POST['txtNombreAmigo']."%' 
										 or u.alias like '%".$_POST['txtNombreAmigo']."%')";								
							}
							else
							{
								$like = "";
							}
						include('listarMisAmigos.php');	
							
					?>
			
			</div>
		</form>
	</body>
</html>
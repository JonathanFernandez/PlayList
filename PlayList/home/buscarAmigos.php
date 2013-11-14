<?php
	session_start();
?>
<!	DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html  xmlns="http://www.w3.org/1999/xhtml">
	<head>

	<title>Buscar Amigos</title>
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
			
			<div id="divBuscarAmigos" class="buscarAmigos">
						
				<table>
					<tr>
						<td>
							<input type="text" name="txtNombreAmigo" id="txtNombreAmigo"/>
						</td>
						<td>
							<input type="submit" name="btnBuscarAmigo" id="btnBuscarAmigo" value="Buscar"/>
						</td>
					</tr>
				</table>
				<table>
					<?php 
							if(isset($_POST['btnBuscarAmigo']))
							{
								$like = "and (nombre like '%".$_POST['txtNombreAmigo']."%' or apellido like '%".$_POST['txtNombreAmigo']."%' 
										 or alias like '%".$_POST['txtNombreAmigo']."%')";								
							}
							else
							{
								$like = "";
							}
						include('listarBuscarAmigos.php');	
							
					?>
				</table>
						
			</div>
		</form>
	</body>
</html>
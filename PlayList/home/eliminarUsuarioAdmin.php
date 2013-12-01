<?php
	session_start();
?>
<!	DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html  xmlns="http://www.w3.org/1999/xhtml">
	<head>

	<title>Eliminar Usuarios</title>
	<script type="text/javascript" src="../jQuery/jquery-1.9.1.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
	<link rel="stylesheet" type="text/css" href="../css/menuStyles.css"/>
	<script src="../jQuery/1.10.3jquery-ui.js"></script>
	<script type="text/javascript">
			var int=self.setInterval("refresh()",180000);
			function refresh()
			{
					location.reload(true);
			}
		</script>
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
		<form action=""method="post" enctype="" onsubmit="">
		
			<?php include ('headerMenu.php'); ?>
				
			<?php include ('menuAdmin.php'); ?>
			
			<?php include ('conectados.php'); ?>
		
			<div id="divEliminarUsuario" class="eliminar">
				
					<input type="text" name="txtNombreUsuario" id="txtNombreUsuario" class="boton"/>
				
					<input type="submit" name="btnBuscarUsuario" id="btnBuscarUsuario" value="Buscar" class="boton"/>
				
				<?php 
						if(isset($_POST['btnBuscarUsuario']))
						{
							$like = "and (u.nombre like '%".$_POST['txtNombreUsuario']."%' or u.apellido like '%".$_POST['txtNombreUsuario']."%' 
									 or u.alias like '%".$_POST['txtNombreUsuario']."%')";								
						}
						else
						{
							$like = "";
						}
					include('listarElimiarUsuarios.php');		
				?>
			</div>
		
		</form>
	</body>
</html>
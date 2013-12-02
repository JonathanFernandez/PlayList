<?php
	session_start();
?>
<!	DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html  xmlns="http://www.w3.org/1999/xhtml">
	<head>

	<title>Solicitud de Amistad</title>
	<script type="text/javascript" src="../jQuery/jquery-1.9.1.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
	<link rel="stylesheet" type="text/css" href="../css/menuStyles.css"/>
	<script src="../jQuery/1.10.3jquery-ui.js"></script>
	<script type="text/javascript">
			var int=self.setInterval("refresh()",600000);
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
	
	function AceptarSolicitud(cod_usuarioQueMeSigue)
	{
		var page = 'aceptarSolicitud.php?cod_usuarioQueMeSigue='+cod_usuarioQueMeSigue;
		location.href=page;
		
	}
	function RechazarSolicitud(cod_usuarioQueMeSigue)
	{
		var page = 'rechazarSolicitud.php?cod_usuarioQueMeSigue='+cod_usuarioQueMeSigue;
		location.href=page;
	}
	</script>

	</head>
	<body>
		<form action=""method="post" enctype="" onsubmit="">
		
			<?php include ('headerMenu.php'); ?>
				
			<?php include ('menu.php'); ?>
			
			<?php include ('conectados.php'); ?>
			
			<div id="divSolicitudAmistad" class="solicitudes">
				<?php include ('listarSolicitudes.php'); ?>
			</div>
			
		</form>
	</body>
</html>
<?php
	if(isset($_SESSION['finish']))
		if($_SESSION['finish'] == true)
			{
				echo "error de logueo";
				$_SESSION['finish'] = false;
			}
?>
<!	DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>CrearPlayList</title>
<script type="text/javascript" src="../jQuery/jquery-1.9.1.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
<link rel="stylesheet" type="text/css" href="../css/menuStyles.css"/>
<script src="../jQuery/1.10.3jquery-ui.js"></script>

<script type="text/javascript">
$(function() {
    $( "#menu" ).menu();
  });

</script>

</head>
<body>
<form action="subirPlaylist.php"method="post">
<table border="0" style="width:100%;">
	<tr>
		<td colspan="2">
			<?php include ('headerMenu.php'); ?>
		</td>
	</tr>
	<tr>
		<td style="width:20%;">
			<?php include ('menu.php'); ?>
		</td>
		<td>
			<div class="CrearPlayList">
				<div class="Contenedor" id="contenedor1">
					<div class="tags" id="tag1">
						Nombre: 
					</div>
					<div class="inputs" id="input1">
						<input type="text" name="nomPlaylist" id="nomPlaylist" size="35"/>
					</div>
				</div>
				
				<div class="Contenedor" id="contenedor2">
					<div class="tags" id="tag2">
						Categor&iacute;a: 
					</div>
					<div class="inputs" id="input2" >	
						<input type="text" name="categoria" id="categoria" size="35"/>
					</div>
				</div>
				
				<div class="Contenedor" id="contenedor3">
					<div class="tags" id="tag3">
						Privacidad: 
					</div>
					<div class="inputs" id="input3">	
						<input type="radio" name="privacidad" value="1" checked> publica
						<input type="radio" name="privacidad" value="2"> privada
						<input type="radio" name="privacidad" value="3"> compartida
					</div>
				</div>
				
				<div class="submit" id="submit">
					<input type="submit" value="Crear"/>
				</div>
			</div>
			
		</td>
	</tr>

</table>







</form>
</body>
</html>
<?php
	session_start();
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
			  
			function validarPlaylist(){
			
				var msg ="";
				var nom = document.getElementById("nomPlaylist");
				if(nom.value.length < 3 && nom.value.length < 25)
				{
						msg = msg + "el nombre debe contener entre 3 y 25  caracteres \n";
						document.getElementById("imgNomPlaylist").style.display = "block";
				}
				else
					document.getElementById("imgNomPlaylist").style.display = "none";
					
				var categ = document.getElementById("categoria");
				if(categ.value.length < 3 && categ.value.length < 50)
				{
						msg = msg + "el nombre debe contener entre 3 y 50  caracteres \n";
						document.getElementById("imgCateg").style.display = "block";
				}
				else
					document.getElementById("imgCateg").style.display = "none";
					
				if(msg.length > 0)
			{
				alert(msg);
				return false;
			}
			return true;
			}
		</script>
	</head>
	<body>
		<form action="insertarPlaylist.php"method="post" onsubmit="javascript:return validarPlaylist()">
			<?php include ('headerMenu.php'); ?>
	
			<?php include ('menu.php'); ?>
			
			<?php include ('conectados.php'); ?>
			
			<div class="crear">
				<fieldset>
					<legend>Crear Playlist</legend>
						<div class="contenido">
							<label for="nombre">Nombre:</label>
							<input type="text" name="nomPlaylist" id="nomPlaylist" size="35" class="input"/>
							<img src="../images/cruz.png"/ id="imgNomPlaylist" class="img" style="display:none;"></br>
						</div>
						<div class="contenido">
							<label for="categoria">Categor&iacute;a:</label>
							<input type="text" name="categoria" id="categoria" size="35" class="input"/>
							<img src="../images/cruz.png" id="imgCateg" class="img" style="display:none;"/>
						</div>
						<div class="contenido">
							<label for="privacidad">Privacidad:</label>
							<div class="input">
								<input type="radio" name="privacidad" value="1" checked> Publica
								<input type="radio" name="privacidad" value="2"> Privada
								<input type="radio" name="privacidad" value="3"> Compartida
							</div>
						</div>
						<div class="submit" id="submit">
							<input type="submit" class="boton" value="Crear"/>
						</div>
				</fieldset>
			</div>
		</form>
	</body>
</html>
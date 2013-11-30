<?php
	session_start();
?>
<!	DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html  xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>CrearMusica</title>
		<script type="text/javascript" src="../jQuery/jquery-1.9.1.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
		<link rel="stylesheet" type="text/css" href="../css/menuStyles.css"/>
		<script src="../jQuery/1.10.3jquery-ui.js"></script>

		<script type="text/javascript">
		$(function() {
			$( "#menu" ).menu();
		  });
		  
		 function validarMusica()
		 {
			var msg ="";
			var nom = document.getElementById("nombre");
			if(nom.value.length < 1 && nom.value.length < 45)
			{
					msg = msg + "el nombre debe contener entre 1 y 45  caracteres \n";
					document.getElementById("imgNombre").style.display = "block";
			}
			else
				document.getElementById("imgNombre").style.display = "none";
			var artista = document.getElementById("artista");
			if(artista.value.length < 1 && artista.value.length < 45)
			{
				msg = msg + "el artista debe contener entre 1 y 45  caracteres \n";
				document.getElementById("imgArtista").style.display = "block";
			}
			else
				document.getElementById("imgArtista").style.display = "none";
			var album = document.getElementById("album");
			if(album.value.length < 1 && album.value.length < 45)
			{
				msg = msg + "la album debe contener entre 1 y 45  caracteres \n";
				document.getElementById("imgAlbum").style.display = "block";
			}
			else
				document.getElementById("imgAlbum").style.display = "none";
				
			var archivo = document.getElementById("archivo");
			if(archivo.value.length < 1 && archivo.value.length < 45)
			{
				msg = msg + "debe seleccionar un archivo \n";
				document.getElementById("imgArchivo").style.display = "block";
			}
			else
				document.getElementById("imgArchivo").style.display = "none";
				
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
		<form action="subirMusica.php"method="post" enctype="multipart/form-data" onsubmit="javascript:return validarMusica()">

			<?php include ('headerMenu.php'); ?>
		
			<?php include ('menu.php'); ?>
			
			<?php include ('conectados.php'); ?>
			
			<div class="crear">
				<fieldset>
					<legend>Crear Musica</legend>
					<div class="contenido">
						<label for="nombre">Nombre:</label>
						<input type="text" name="nombre" id="nombre" class="input"/>
						<img src="../images/cruz.png"/ id="imgNombre" style="display:none;" class="img"/>
					</div>
					<div class="contenido">
						<label for="genero">Genero:</label>
						<select id="genero" name="genero" class="input">
							<option value="18">Otros</option>
							<option value="1">Rock</option>
							<option value="2">Pop</option>
							<option value="3">Punk</option>
							<option value="4">Salsa</option>
							<option value="5">Bachata</option>
							<option value="6">Merengue</option>
							<option value="7">Reggeton</option>
							<option value="8">Hip-Hop</option>
							<option value="9">Electronica</option>
							<option value="10">Heavy-Metal</option>
							<option value="11">Rumba</option>
							<option value="12">Reggae</option>
							<option value="13">Blues</option>
							<option value="14">Jazz</option>
							<option value="15">Disco</option>
							<option value="16">Tango</option>
							<option value="17">Cumbia</option>
						</select></br>
						<img src="../images/cruz.png"/ id="imgGenero" style="display:none;" class="img"/>
					</div>
					<div class="contenido">
						<label for="artista">Artista:</label>
						<input type="text" name="artista" id="artista" class="input"/>
						<img src="../images/cruz.png"/ id="imgArtista" style="display:none;" class="img"/>
					</div>
					<div class="contenido">
						<label for="album">Album:</label>
						<input type="text" name="album" id="album" class="input"/>
						<img src="../images/cruz.png"/ id="imgAlbum" style="display:none;" class="img"/>
					</div>
					<div class="contenido">
						<label for="archivo">Archivo:</label>
						<input name="archivo" type="file" size="35" id="archivo" class="input"/>
						<img src="../images/cruz.png"/ id="imgArchivo" style="display:none;" class="img"/>
					</div>
					<div class="submit">
						<input name="enviar" type="submit" class="boton" value="Subir Musica"/>
						<input name="action" type="hidden" class="boton" value="upload" />
					</div>
				</fieldset>
			</div>			 
			<?php
				if(isset($_SESSION['finish']))
				{
					if($_SESSION['finish'] == 1)
					{
						echo "<script type='text/javascript'>alert('Solo se puede subir archivos MP3');</script>";
						$_SESSION['finish'] = 0;
					}
					if($_SESSION['finish'] == 2)
					{
						echo "<script type='text/javascript'>alert('El archivo se ha subido con exito');</script>";
						$_SESSION['finish'] = 0;
					}
				}
			?>
		</form>
	</body>
</html>
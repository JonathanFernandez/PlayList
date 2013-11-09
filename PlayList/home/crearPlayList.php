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
		
		
			<div id="divCrearPlayList" class="CrearPLayList">
				<div class="Contenedor" id="contenedor1">
					<div class="tags" id="tag1">
						Nombre: 
					</div>
					<div class="inputs" id="input1">
						<input type="text" name="nomPlaylist" id="nomPlaylist" size="35"/>
					</div>
					<div class="cruz">
						<img src="../images/cruz.png"/ id="imgNomPlaylist" style="display:none;">
					</div>
				</div>
				
				<div class="Contenedor" id="contenedor2">
					<div class="tags" id="tag2">
						Categor&iacute;a: 
					</div>
					<div class="inputs" id="input2" >	
						<input type="text" name="categoria" id="categoria" size="35"/>
					</div>
					<div class="cruz">
						<img src="../images/cruz.png"/ id="imgCateg" style="display:none;">
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
			








</form>
</body>
</html>
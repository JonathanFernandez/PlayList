<?php
	session_start();
?>
<!	DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>ListadoPlaylist</title>
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
<?php 
	if(isset($_POST['bntOrdenar']))
	{
		$orderBy = "order by ".$_POST['ordenar'];
		//return false;
	}
	else
	{
		$orderBy = "order by nombre";
		//return false;
	}
	
	
?>
</head>
<body>
<form action="" method="post" enctype="" onsubmit="">
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
			<div id="divAsignarMusica">
				<table>
				<tr>
					<td>
						Ordenar por:
					</td>
					<td>
						<select id="ordernar" name="ordenar">
							<option value="nombre" <?php if(isset($_POST['ordenar']) && $_POST['ordenar']=='nombre')echo "selected='selected'"?>>Nombre</option>
							<option value="genero" <?php if(isset($_POST['ordenar']) && $_POST['ordenar']=='genero')echo "selected='selected'"?>>Genero</option>
							<option value="artista" <?php if(isset($_POST['ordenar']) && $_POST['ordenar']=='artista')echo "selected='selected'"?>>Artista</option>
							<option value="album" <?php if( isset($_POST['ordenar']) &&$_POST['ordenar']=='album')echo "selected='selected'"?>>Album</option>
						</select>
					</td>
					<td>
						<input type="submit" id="btnOrdenar" name="bntOrdenar" value="Ordernar">
					</td>
				</tr>
				<tr>
					<td>
						Mis Play List:
					</td>
					<td>
						<select id="misPlayList" name="misPlayList">
						 <?php include ('misPlayListSql.php');?>
					 	</select>
					</td>
				</tr>
				</table>
				<table border="1">
					<tr>
						<td>Nombre</td>
						<td>Genero</td>
						<td>Artista</td>
						<td>Album</td>
						<td>Seleccionar</td>
					</tr>
					<?php include ('listarMusica.php');?>
				</table>
				<input type="submit" value="Asignar" id="btnAsignar" name="btnAsignar" onclick = "this.form.action = 'insertarMusicaEnPlayList.php'"/>
			</div>
				     
		</td>
	</tr>

</table>
<?php
	if(isset($_SESSION['finish']))
	{
		if($_SESSION['finish'] == true)
		{
			echo "se ha subido correctamente la musica a la play list";
			$_SESSION['finish'] = false;
		}
	}
?>
</div>

</form>
</body>
</html>
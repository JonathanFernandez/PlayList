<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PlayList</title>
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
<form action="" method="post">
<div id="header">
	logo
</div>
<div id="divMenu">
<ul id="menu">
	<li><a href="#">Notificacion</a></li>
	<li>
		<a href="#">Play List</a>
    <ul>
      <li><a href="crearPlayList.php">Crear</a></li>
      <li><a href="#">Mis Play List</a></li>
      <li><a href="#">Play List Publicas</a></li>
	  <li><a href="#">Play List de Amigos</a></li>
	</ul>
  </li>
  <li><a href="#">Subir Canciones</a></li>
  <li><a href="#">Ranking</a></li>
  <li><a href="#">Amigos</a></li>
</ul>
</div>
</form>
</body>
</html>
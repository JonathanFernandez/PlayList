<?php
	session_start();
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
	
	$sql_query ="update usuario set log = 0 where code =".$_SESSION['cod_usuario'];
	$query = mysql_query($sql_query,$conn);
	$filas = mysql_num_rows($query);
	
	mysql_close($conn);
	
	session_destroy();
	header("location:login.php");
?>
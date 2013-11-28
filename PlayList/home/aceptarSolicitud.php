<?php
	session_start();
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
					
	$sql_query = "update seguimientousuario set cod_estadoseguimiento = 3 
					where cod_usuario = ".$_REQUEST['cod_usuarioQueMeSigue']." and cod_usuarioaseguir = ".$_SESSION['cod_usuario'];
	
	$query = mysql_query($sql_query,$conn);
	$sql_query = "insert into seguimientousuario(cod_usuario, cod_usuarioAseguir,cod_estadoseguimiento)
					values(".$_SESSION['cod_usuario'].",".$_REQUEST['cod_usuarioQueMeSigue'].",3)";;
	
	$query = mysql_query($sql_query,$conn);
		
	header("location:solicitudesDeAmistad.php");
		
	mysql_close($conn); 

?>
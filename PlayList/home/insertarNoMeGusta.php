<?php
	session_start();
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
					
	$sql_query = "select * from rankingplaylist where cod_usuario = ".$_SESSION['cod_usuario']." and cod_playlist = ".$_REQUEST['codPlaylist']; 
	
	$query = mysql_query($sql_query,$conn);
	
	$filas = mysql_num_rows($query);
	
	if($filas == 0)
	{
		$sql_query = "insert into rankingplaylist(cod_usuario, cod_playlist,meGusta,noMeGusta)	values(".$_SESSION['cod_usuario'].",".$_REQUEST['codPlaylist'].",0,1)";
	
	}
	else
	{
		$sql_query = "update rankingplaylist set noMegusta = 1 , meGusta = 0 where cod_usuario = ".$_SESSION['cod_usuario']." and cod_playlist = ".$_REQUEST['codPlaylist']; 
		
	}
	
	$query = mysql_query($sql_query,$conn);
	
	$sql_query = "insert into notificaciones(cod_usuario, cod_tipo, cod_playlist,fecha,likes)
					  values(".$_SESSION['cod_usuario'].",3,".$_REQUEST['codPlaylist'].",now(),0)";
		
	$query = mysql_query($sql_query,$conn);
	
	header("location:listadoPlayList2.php?privacidad=".$_REQUEST['privacidad']);
		
	mysql_close($conn); 

?>
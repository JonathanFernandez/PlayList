<?php
	session_start();
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
					
	$sql_quert = "select * from rankingplaylist where cod_usuario = ".$_SESSION['cod_usuario']." and cod_playlist = ".$_REQUEST['codPlaylist']; 
	$query = mysql_query($sql_query,$conn);
	
	$filas = mysql_num_rows($query);
	if($filas == 0)
	{
		$query = "insert into rankingplaylist(cod_usuario, cod_playlist,meGusta,noMeGusta)	values(".$_SESSION['cod_usuario'].",".$_REQUEST['codPlaylist'].",1,0)"
	
	}
	else
	{
		$query = "update rankingplaylist set noMegusta = 0 , meGusta = 1 where cod_usuario = ".$_SESSION['cod_usuario']." and cod_playlist = ".$_REQUEST['codPlaylist']; 
	}
	
	$query = mysql_query($sql_query,$conn);
	
	$sql_query = "insert into notificaciones(cod_usuario, cod_tipo, cod_playlist,fecha)
					  values(".$_SESSION['cod_usuario'].",3,".$_REQUEST['codPlaylist'].",now())";
		
	$query = mysql_query($sql_query,$conn);
	
	header("location:listadoPlayList.php");
		
	mysql_close($conn); 

?>
<?php
	session_start();
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
						
	$sql_query ="insert into seguimientousuario(cod_usuario, cod_usuarioAseguir,cod_estadoSeguimiento)
				 values(".$_SESSION['cod_usuario'].",".$_REQUEST['codUsuarioAEnviar'].",1)";
				
	
	$query = mysql_query($sql_query,$conn);
	$sql_query = "insert into notificaciones(cod_usuario, cod_tipo, cod_playlist,fecha)
					  values(".$_SESSION['cod_usuario'].",1,NULL,now())";
		
	$query = mysql_query($sql_query,$conn);
	
	header("location:buscarAmigos.php");
		
	mysql_close($conn); 

?>
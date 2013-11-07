<?php
	session_start();
?>
<!	DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Insert Musica en PlayList</title>

<script type="text/javascript">
</script>

</head>
<body>
<form action="" method="post">
<?php
	
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
	$sql_query = "";
	
	if(!empty($_POST['check_list']))
	{	
		$music = $_POST['check_list'];		
		$N = count($music);
 						
		for($i=0; $i < $N; $i++)
		{
			$sql_query  = "delete musicaplaylist where cod_playlist = ".$_POST['misPlayList'];
			$query = mysql_query($sql_query,$conn);		
			
			$sql_query = "insert into musicaplaylist(cod_musica, cod_playlist)values(".$music[$i].",".$_POST['misPlayList'].")";
			$query = mysql_query($sql_query,$conn);		
			
			$sql_query = "insert into notificaciones(cod_usuario, cod_tipo, cod_playlist,fecha)
					  values(".$_SESSION['cod_usuario'].",2,(select ifnull(p.code,0) from playlist p where p.code =".$_POST['misPlayList']." and p.cod_usuario =".$_SESSION['cod_usuario']."),now())";
		
			$query = mysql_query($sql_query,$conn);		
		}					
	}
	mysql_close($conn);
	$_SESSION['finish'] = true;
	header("location:asignarMusica.php");
	
?>
</form>
</body>
</html>
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
		}					
	}
	mysql_close($conn);
	$_SESSION['finish'] = true;
	header("location:asignarMusica.php");
	//echo $_POST['check_list'];
	/*echo $_POST['misPlayList'];

	if(!empty($_POST['check_list']))
	{	
		$aDoor = $_POST['check_list'];		
		$N = count($aDoor);
 						
		for($i=0; $i < $N; $i++)
		{
			echo $aDoor[$i] . " , ";
					
		}					
	}*/
	
	/*$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
	$sql_query = "insert into musica(nombre, cod_genero,artista, path, album)
					  values('".$_POST['nombre']."','".$_POST['genero']."','".$_POST['artista']."','".$destino."','".$_POST['album']."')";
	
	$query = mysql_query($sql_query,$conn);
	mysql_close($conn);
	$_SESSION['finish'] = 2;
	header("location:crearMusica.php");
	*/
?>
</form>
</body>
</html>
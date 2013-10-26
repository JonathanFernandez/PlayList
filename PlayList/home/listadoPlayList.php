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

</head>
<body>
<form action=".php"method="post" enctype="" onsubmit="javascript:return ">
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
			<div id="divListadoPlayList">
				<div id="accordion">
				
					<?php
						
						$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
						mysql_select_db("playlist",$conn) or die;
						switch($_REQUEST['privacidad'])
						{
							case 1:
								$sql_query ="select * from playList where cod_usuario = ".$_SESSION['cod_usuario']." and cod_privacidad = ".$_REQUEST['privacidad']."";
							break;
							case 2:
								$sql_query ="select * from playList where cod_privacidad = ".$_REQUEST['privacidad']."";
							break;
							case 3:
								$sql_query ="select * from playList where cod_usuario = ".$_SESSION['cod_usuario']." and cod_privacidad = ".$_REQUEST['privacidad']."";
							break;
						}
						
						$query = mysql_query($sql_query,$conn);
						
						$filas = mysql_num_rows($query);
						if($filas>=1)
						{
							
							while($resultado = mysql_fetch_array($query))
							{ 
								echo "<h3>".$resultado['nombre']." 
								<object type='application/x-shockwave-flash' width='400' height='15'
										data='xspf_player_slim.swf?playlist_url=http://localhost:8080/PlayList/home/playlist.xspf'>
										<param name='movie'value='xspf_player_slim.swf?playlist_url=http://localhost:8080/Playlist/home/playlist.xspf'/>
								</object>'<h3>";
								
								
								echo "<div>\n";
								echo "<p>\n";
								echo "	<ul>\n";
								$sql_query2 ="select m.nombre, mp.cod_playlist, p.code
											 from musica m 
											 inner join musicaplaylist mp on
												mp.cod_musica = m.code 
											 inner join playlist p on
												mp.cod_playlist = p.code
											 where p.code = ".$resultado['code']."
											";
								
								$query2 = mysql_query($sql_query2,$conn);
								$filas2 = mysql_num_rows($query2);
								if($filas2>=1)
								{
									while($resultado2 = mysql_fetch_array($query2))
									{ 
										echo "<li>".$resultado2['nombre']."</li>\n";
									}
								}	
								
								echo "	</ul>\n";
								echo "</p>\n";
							    echo "</div>\n";
							}
							
						}
							 
						mysql_close($conn);

					?>
				</div>
				
			</div>
				     
		</td>
	</tr>

</table>
<?php
	if(isset($_SESSION['finish']))
	{
		if($_SESSION['finish'] == 1)
		{
			echo "<script type='text/javascript'>alert('Solo se puede subir archivos MP3');</script>";
			$_SESSION['finish'] = 0;
		}
		if($_SESSION['finish'] == 2)
		{
			echo "<script type='text/javascript'>alert('El archivo se ha subido con exito');</script>";
			$_SESSION['finish'] = 0;
		}
	}
	?>




</div>

</form>
</body>
</html>
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
	function insertMegusta(cod_playlist, privacidad)
	{
		var page = 'insertarMegusta.php?codPlaylist='+cod_playlist+'&privacidad='+privacidad ;
		location.href=page;
	}
	function insertNoMegusta(cod_playlist, privacidad)
	{
		var page = 'insertarNoMegusta.php?codPlaylist='+cod_playlist+'&privacidad='+privacidad ;
		location.href=page;
	}
	function descargarPlaylist(nombreArchivo, privacidad)
	{
		var page = 'descargarPlaylist.php?nombreArchivo='+nombreArchivo+'&privacidad='+privacidad ;
		location.href=page;
	}
	function eliminarPlaylist(cod_playlist, privacidad)
	{
		var page = 'eliminarPlaylist.php?codPlaylist='+cod_playlist+'&privacidad='+privacidad ;
		location.href=page;
	}
	</script>

	</head>
	<body>
		<form action=""method="post" enctype="" onsubmit="">
		
			<?php include ('headerMenu.php'); ?>
				
			<?php include ('menu.php'); ?>
			
			<?php include ('conectados.php'); ?>
			
				<div id="divListadoPlayList" class="listadoPlaylist">
				
					<?php
						$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
						mysql_select_db("playlist",$conn) or die;
						switch($_REQUEST['privacidad'])
						{
							case 1:
								$sql_query ="select
												pl.* , ifnull(rpl.meGusta,0) as meGusta, ifnull(rpl.NoMegusta,0) as meNoGusta, u.alias
											from 
												playlist pl
											left join rankingplaylist rpl on
												rpl.cod_playlist = pl.code
											left join usuario u on
												u.code = rpl.cod_usuario

											where pl.cod_privacidad = 1";
							break;
							case 2:
								$sql_query ="select 
												pl.* , ifnull(rpl.meGusta,0) as meGusta, ifnull(rpl.NoMegusta,0) as meNoGusta, u.alias
											from 
												playlist pl
											left join rankingplaylist rpl on
												rpl.cod_playlist = pl.code
											left join usuario u on
												u.code = rpl.cod_usuario

											where pl.cod_usuario = ".$_SESSION['cod_usuario'];
							break;
							case 3:
								$sql_query ="select 
												pl.* , ifnull(rpl.meGusta,0) as meGusta, ifnull(rpl.NoMegusta,0) as meNoGusta, u.alias
											from 
												playlist pl
											left join rankingplaylist rpl on
												rpl.cod_playlist = pl.code
											inner join usuario u on
												u.code = pl.cod_usuario
											inner join seguimientousuario su on
												su.cod_estadoseguimiento = 3 and
												su.cod_usuario = ".$_SESSION['cod_usuario']." and
												su.cod_usuarioaseguir = pl.cod_usuario
											where pl.cod_privacidad = 3";
							break;
						}
						
						$query = mysql_query($sql_query,$conn);
						
						$filas = mysql_num_rows($query);
						if($filas>=1)
						{
							echo "<table border='0'>";
							while($resultado = mysql_fetch_array($query))
							{ 	
								$archivo = fopen($resultado['nombre'].".xspf","a");
								
								echo "<tr><td>".$resultado['nombre']." (".$resultado['alias']." )</td>"; 
									echo "<td><object type='application/x-shockwave-flash' width='400' height='15'
												data='xspf_player_slim.swf?playlist_url=http://localhost:8080/PlayList/home/".$resultado['nombre'].".xspf'>
												<param name='movie'value='xspf_player_slim.swf?playlist_url=http://localhost:8080/Playlist/home/".$resultado['nombre'].".xspf'/>
												</object>";
									echo "</td>";
								echo "<td>";
								if($resultado['meGusta'] == 0)												
									echo "<input type='button' class='boton' name='btnMegusta_".$resultado['code']."' value='Me gusta' onclick ='javascript:insertMegusta(".$resultado['code'].",".$_REQUEST['privacidad'].");'/>";
								echo "</td>"; 
								echo "<td>";
								if($resultado['meNoGusta'] == 0)
									echo "<input type='button' class='boton' name='btnNoMegusta_".$resultado['code']."' value='No Me gusta' onclick ='javascript:insertNoMegusta(".$resultado['code'].",".$_REQUEST['privacidad'].");'/>";
								echo "</td>"; 
								echo "<td>";
								$nombreFile = "\"".$resultado['nombre'].".xspf\"";
								echo "<input type='button' class='boton' name='btnDescargar_".$resultado['code']."' value='Descargar' onclick ='javascript:descargarPlaylist(".$nombreFile.",".$_REQUEST['privacidad'].");'/>";
								echo "</td>"; 
								echo "<td>";
								if ($_REQUEST['privacidad'] == 2)
									echo "<input type='button' class='boton' name='btnEliminar_".$resultado['code']."' value='Eliminar' onclick ='javascript:eliminarPlaylist(".$resultado['code'].",".$_REQUEST['privacidad'].");'/>";
								echo "</td>"; 
								echo "</tr>";
								
								
								$sql_query2 ="select m.nombre, mp.cod_playlist, p.code, m.path
											 from musica m 
											 inner join musicaplaylist mp on
												mp.cod_musica = m.code 
											 inner join playlist p on
												mp.cod_playlist = p.code
											 where p.code = ".$resultado['code']."
											";
								fputs($archivo,"<?xml version='1.0' encoding='UTF-8' ?>");
								fputs($archivo,"\n");
								fputs($archivo,"<playlist version='1' xmlns='http://xspf.org/ns/0/'>");
								fputs($archivo,"\n");
								fputs($archivo,"<trackList>");
								fputs($archivo,"\n\t");
										
								$query2 = mysql_query($sql_query2,$conn);
								$filas2 = mysql_num_rows($query2);
								if($filas2>=1)
								{
									echo "<tr colspan='5'>";
									echo "<td>";
									while($resultado2 = mysql_fetch_array($query2))
									{ 	
										echo $resultado2['nombre']."</br>";
										fputs($archivo,"<track><title>".$resultado2['nombre']."</title><location>".$resultado2['path']."</location></track>");
										fputs($archivo,"\n");
									}
									echo "</tr>";
									echo "</td>";
								}	
								fputs($archivo,"\t");
								fputs($archivo,"</trackList>");
								fputs($archivo,"\n");
								fputs($archivo,"</playlist>");
								
								
								
								fclose($archivo);
							}
							echo "</table>";
						}
							 
						mysql_close($conn);
					?>
				</div>
		
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
		</form>
	</body>
</html>
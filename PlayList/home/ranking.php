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
			var int=self.setInterval("refresh()",600000);
			function refresh()
			{
					location.reload(true);
			}
		</script>
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
			
				<div id="divRanking" class="ranking">
				
					<?php
						$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
						mysql_select_db("playlist",$conn) or die;
						$sql_query = "
										select
											rpl.cod_playlist, pl.nombre ,sum(meGusta) - (noMegusta) as cant, u.alias
										from 
											rankingplaylist rpl
										inner join playlist pl on
											pl.code = rpl.cod_playlist and
											pl.cod_privacidad = 1
										inner join usuario u on
											u.code = pl.cod_usuario
										group by rpl.cod_playlist 
										order by 3 desc, pl.nombre
										;
										";
						$query = mysql_query($sql_query,$conn);
						
						$filas = mysql_num_rows($query);
						if($filas>=1)
						{
							echo "<table border='1' align='center'>";
							echo "<tr>";
								echo "<td>Playlist";
								echo "</td>"; 
								echo "<td>Usuario";
								echo "</td>"; 
								echo "<td>Votos";
								echo "</td>"; 
							echo "</tr>";
							while($resultado = mysql_fetch_array($query))
							{ 	
								echo "<tr>";
									echo"<td>".$resultado['nombre'];
									echo "</td>"; 
									echo "<td>".$resultado['alias'];
									echo "</td>"; 
									echo "<td>".$resultado['cant'];
									echo "</td>"; 
								echo "</tr>";

							}
							echo "</table>";
						}
							 
						mysql_close($conn);
					?>
				</div>
		
		</form>
	</body>
</html>
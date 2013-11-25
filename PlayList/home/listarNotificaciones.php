<?php
	
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
						
	$sql_query = "	select 
						n.fecha,
						concat('A ',u.alias,(
												case likes
												when 1 then ' le gusta '
												else ' no le gusta '
												end
											),
								'la playlist ',p.nombre) as mensaje
					from 
						notificaciones n 
					inner join usuario u on
						n.cod_usuario = u.code
					inner join playlist p on
						p.code = n.cod_playlist
					where 
						n.cod_usuario in (
											select cod_usuarioaseguir from seguimientousuario where cod_usuario = ".$_SESSION['cod_usuario']."
											) and
						n.cod_tipo = 3
					union 
					select 
						n.fecha,
						concat(u.alias, ' ha realizado cambios en  la playlist ', p.nombre
							
						) as mensaje
					from 
						notificaciones n 
					inner join usuario u on
						n.cod_usuario = u.code
					inner join playlist p on
						p.code = n.cod_playlist and
						p.cod_privacidad in (1,3)
					where 
						n.cod_usuario in (
											select cod_usuarioaseguir from seguimientousuario where cod_usuario = ".$_SESSION['cod_usuario']."
											) and
						n.cod_tipo = 2
					order by 1 desc
					";
		
	$query = mysql_query($sql_query,$conn);
	
	$filas = mysql_num_rows($query);
	
	if($filas>=1)
	{
		echo "<table>";
		while($resultado = mysql_fetch_array($query))
		{ 
			echo "<tr>";
				echo "<td width='80%'>";
					echo $resultado['mensaje'];
				echo "</td>";
				echo "<td>";
					echo $resultado['fecha'];
				echo "</td>";
			echo "</tr>";		
		}
		echo "</table>";
	}
	mysql_close($conn); 

?>
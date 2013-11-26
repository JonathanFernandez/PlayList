<?php
	
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
						
	$sql_query = "	select distinct
						n.cod_usuario as cod_usuarioQueMeSigue,
						su.cod_estadoSeguimiento, 
						-- n.fecha,
						concat('El usuario ', u.alias, ' te ha agregado como amigo '
								) as mensaje
					from 
						notificaciones n 
					inner join seguimientousuario su on
						su.cod_usuarioAseguir = ".$_SESSION['cod_usuario']." and
						su.cod_estadoseguimiento = 1
					inner join usuario u on
						u.code = su.cod_usuario and
						n.cod_usuario = u.code
					where 
						n.cod_tipo = 1
					order by fecha desc
					";
		
	$query = mysql_query($sql_query,$conn);
	
	$filas = mysql_num_rows($query);
	
	if($filas>=1)
	{
		echo "<table>";
		while($resultado = mysql_fetch_array($query))
		{ 
			echo "<tr>";
				echo "<td width='70%'>";
					echo $resultado['mensaje'];
				echo "</td>";
				echo "<td>";
					echo "<input type='button' class='boton' name='btnAceptar_".$resultado['cod_usuarioQueMeSigue']."' value='Aceptar' onclick ='javascript:AceptarSolicitud(".$resultado['cod_usuarioQueMeSigue'].");'/>";
				echo "</td>";
				echo "<td>";
					echo "<input type='button' class='boton' name='btnRechazar_".$resultado['cod_usuarioQueMeSigue']."' value='Rechazar' onclick ='javascript:RechazarSolicitud(".$resultado['cod_usuarioQueMeSigue'].");'/>";
				echo "</td>";
				/*echo "<td>";
					echo $resultado['fecha'];
				echo "</td>";*/
			echo "</tr>";		
		}
		echo "</table>";
	}
	mysql_close($conn); 

?>
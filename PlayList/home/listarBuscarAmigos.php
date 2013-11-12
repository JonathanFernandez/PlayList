<?php
	
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
						
	$sql_query ="select
						*
				from 
					usuario u
				where u.code != ".$_SESSION['cod_usuario']." and u.code not in (select cod_usuarioAseguir from seguimientousuario where cod_estadoSeguimiento = 1 or cod_estadoSeguimiento = 3)and
				cod_tipousuario = 2
				order by nombre;";
		
	$query = mysql_query($sql_query,$conn);
	
	$filas = mysql_num_rows($query);
	
	if($filas>=1)
	{
		
		while($resultado = mysql_fetch_array($query))
		{ 
			echo "<tr>";
				echo "<td>";
					echo $resultado['nombre']." ".$resultado['apellido']."-(".$resultado['alias'].")";
				echo "</td>";
				echo "<td>";
					echo "<input type='submit' value='Enviar Solicitud' class='boton' id='btnEnviarSolicitud".$resultado['code']."' name='btnEnviarSolicitud".$resultado['code']."' onclick =\"this.form.action = 'enviarSolicitud.php?codUsuarioAEnviar=".$resultado['code']."'\"/>";
				echo "</td>";
			echo "</tr>";
								
					
		}
	}
	mysql_close($conn); 

?>
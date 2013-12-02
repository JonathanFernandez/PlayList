<?php
	
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
						
	$sql_query = "select 
					u.nombre, u.apellido, u.alias, su.cod_usuarioAseguir 
				from 
					seguimientousuario su
				inner join usuario u on 
					u.code = su.cod_usuarioASeguir

				where 
					su.cod_usuario = ".$_SESSION['cod_usuario']."  and
					su.cod_estadoSeguimiento = 3 ".$like;
	
		
	$query = mysql_query($sql_query,$conn);
	
	$filas = mysql_num_rows($query);
	
	if($filas>=1)
	{
		echo "<table align='center'>";
		while($resultado = mysql_fetch_array($query))
		{ 
			echo "<tr>";
				echo "<td>";
					echo $resultado['nombre']." ".$resultado['apellido']."-(".$resultado['alias'].")";
				echo "</td>";
				echo "<td>";
					echo "<input type='submit' value='Elimiar' class='boton' id='btnEliminarAmigo".$resultado['cod_usuarioAseguir']."' name='btnEliminarAmigo".$resultado['cod_usuarioAseguir']."' onclick =\"this.form.action = 'eliminarAmigo.php?codUsuarioAEliminar=".$resultado['cod_usuarioAseguir']."'\"/>";
				echo "</td>";
			echo "</tr>";
								
					
		}
		echo"</table>";
	}
	mysql_close($conn); 

?>
<?php
	
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
						
	$sql_query = "	select 
							u.* 
					from 
						usuario u
					where 
						u.cod_tipoUsuario = 2 
						".$like;
	
	
	$query = mysql_query($sql_query,$conn);
	
	$filas = mysql_num_rows($query);
	
	if($filas>=1)
	{
		echo"<table align='center'>";
		while($resultado = mysql_fetch_array($query))
		{ 
			echo "<tr>";
				echo "<td>";
					echo $resultado['nombre']." ".$resultado['apellido']."-(".$resultado['alias'].")";
				echo "</td>";
				echo "<td>";
					echo "<input type='submit' value='Elimiar' class='boton' id='btnEliminarUsuario".$resultado['code']."' name='btnEliminarUsuario".$resultado['code']."' onclick =\"this.form.action = 'eliminarUsuario.php?codUsuarioAEliminar=".$resultado['code']."'\"/>";
				echo "</td>";
			echo "</tr>";
								
					
		}
		echo"</table>";
	}
	mysql_close($conn); 

?>
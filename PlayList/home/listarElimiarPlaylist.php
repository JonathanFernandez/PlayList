<?php
	
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
						
	$sql_query = "	select 
						p.* 
					from 
						playlist p 
						".$like;
	
	
	$query = mysql_query($sql_query,$conn);
	
	$filas = mysql_num_rows($query);
	
	if($filas>=1)
	{
		echo"<table>";
		while($resultado = mysql_fetch_array($query))
		{ 
			echo "<tr>";
				echo "<td>";
					echo $resultado['nombre'];
				echo "</td>";
				echo "<td>";
					echo "<input type='submit' value='Elimiar' class='boton' id='btnEliminarPlaylist".$resultado['code']."' name='btnEliminarPlaylist".$resultado['code']."' onclick =\"this.form.action = 'eliminarPlaylistDeAdmin.php?codPlaylistAEliminar=".$resultado['code']."'\"/>";
				echo "</td>";
			echo "</tr>";
		
		}
		echo"</table>";
	}
	mysql_close($conn); 

?>
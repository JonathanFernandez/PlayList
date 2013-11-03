<?php
	
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
						
	$sql_query ="select m.code, m.nombre,g.genero,m.artista,m.album  from musica m inner join genero g on m.cod_genero = g.code ".$orderBy;
		
	$query = mysql_query($sql_query,$conn);
	
	$filas = mysql_num_rows($query);
	
	if($filas>=1)
	{
		
		while($resultado = mysql_fetch_array($query))
		{ 
			echo "<tr>";
				echo "<td>";
					echo $resultado['nombre'];
				echo "</td>";
				echo "<td>";
					echo $resultado['genero'];
				echo "</td>";
				echo "<td>";
					echo $resultado['artista'];
				echo "</td>";
				echo "<td>";
					echo $resultado['album'];
				echo "</td>";
				echo "<td>";
					
					echo "<input type='checkbox' value ='".$resultado['code']."'id='check_list[]' name='check_list[]'";
						if(!empty($_POST['check_list']))
						{	
							$aDoor = $_POST['check_list'];		
							$N = count($aDoor);
 							
							for($i=0; $i < $N; $i++)
							{
								if( $aDoor[$i] == $resultado['code'])
									echo " checked='true'";
								
							}					
						}
					echo "/>";
					
				echo "</td>";
			echo "</tr>";
								
					
		}
	}
	mysql_close($conn); 

?>
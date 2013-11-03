<?php
	
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
						
	$sql_query ="select code,concat(nombre,'(', categoria,')') as 'nombre' from playList where cod_usuario = ".$_SESSION['cod_usuario']." order by nombre";
										
	
	$query = mysql_query($sql_query,$conn);
	
	$filas = mysql_num_rows($query);
	
	if($filas>=1)
	{
		
		while($resultado = mysql_fetch_array($query))
		{ 
			
			//echo "<option value='".$resultado['nombre']."'>".$resultado['nombre']."</option>";
			
			echo "<option value='".$resultado['code']."'";
			if(isset($_POST['misPlayList']))
				if($_POST['misPlayList']==$resultado['code']) 
					echo " selected='selected'";
			echo " >".$resultado['nombre']."</option>";
			
			
		}	
	}
			
	mysql_close($conn); 

?>
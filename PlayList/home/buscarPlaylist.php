<?php
	
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
						
	$sql_query ="select P.nombre 
				from playList P 
				inner jpoin usuario U on P.cod_usuario = U.cod_usuario
				where U.code = ".$_SESSION['cod_usuario']." and u.code not in
				(	select cod_usuarioAseguir 
					from seguimientousuario 
					where (cod_estadoSeguimiento = 1 or cod_estadoSeguimiento = 3 )and cod_usuario = ".$_SESSION['cod_usuario']."
				)
				and u.code not in
				(	select cod_usuario
					from seguimientousuario 
					where (cod_estadoSeguimiento = 1 or cod_estadoSeguimiento = 3 ) and cod_usuarioAseguir = ".$_SESSION['cod_usuario']."
				)
				and	cod_tipousuario = 2 " .$like." and P.cod_privacidad = 3 or P.cod_privacidad = 1 order by nombre";
										
	
	$query = mysql_query($sql_query,$conn);
	
	$filas = mysql_num_rows($query);
	
	if($filas>=1)
	{
		
		while($resultado = mysql_fetch_array($query))
		{ 
			
			//echo "<option value='".$resultado['nombre']."'>".$resultado['nombre']."</option>";
			
			echo "<option value='".$resultado['nombre']."'";
			if(isset($_POST['buscarPlayList']))
				if($_POST['buscarPlayList']==$resultado['nombre']) 
					echo " selected='selected'";
			echo " >".$resultado['nombre']."</option>";
			
			
		}	
	}
			
	mysql_close($conn); 

?>
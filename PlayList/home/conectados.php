
<div id="menuConectados" class="menuConectados">
	<?php
	
		$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
		mysql_select_db("playlist",$conn) or die;
		
	
		$sql_query = "select 
		u1.code, u1.alias, u1.log
		from usuario u
		inner join seguimientousuario su on
		su.cod_usuario = u.code 
		inner join usuario u1 on
		u1.code != ".$_SESSION['cod_usuario']." and
		u1.code = su.cod_usuarioaseguir and
		su.cod_estadoseguimiento = 3
		where u.code = ".$_SESSION['cod_usuario'];
		
		$query = mysql_query($sql_query,$conn);
		$filas = mysql_num_rows($query);
		
			if($filas>=1)
				{
					while($resultado = mysql_fetch_array($query))
						{ 	
							if($resultado['log'] == 1)
							{
								echo " <p> <img src='..\images\puntoverde.png'/>&nbsp".$resultado['alias']."</p>";
							}
						}
				}
		mysql_close($conn);
	?>
	
</div>

<div id="menuConectados" class="menuConectados">
	<div id="buscar" class="buscar">
		<p>Ingrese Playlist: </p>
		<form action="" method="post" enctype="" onsubmit="">
			<input type="text" name="buscador" id="buscador" class="boton"/>
			<input type="submit" name="btnBuscarPlaylist" id="btnBuscarAmigo" value="Buscar" class="boton"/>
		</form>
		<?php
			
			$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
			mysql_select_db("playlist",$conn) or die;
			
			
			if(isset($_POST['btnBuscarAmigo']))
			{
				$like = "and (nombre like '%".$_POST['buscador']."%' or categoria like '%".$_POST['buscador']."%')";								
			}
			else
			{
				$like = "";
			} 
		?>
	</div>
	<div id="conectados" class="conectados">
		<?php
		
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
</div>
<script type="text/javascript">
function Salir()
{
	var page = 'salir.php';
	location.href = page;
}
</script>

<div id="header" class="header">
	<div class="logo">
		<img src="..\images\logo.jpg" alt="logo"/>
	</div>
	<div class="session">
		<div class="botonSalir">
			<input type="button" value="Salir" id="btnSalir" name="btnSalir" class="boton" onclick ='javascript:Salir()'/> 
		</div>
		<div class="alias">
			<?php echo $_SESSION['alias'] ;?>
		</div>
	</div>
</div>

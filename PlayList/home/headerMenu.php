<script type="text/javascript">
function Salir()
{
	var page = 'salir.php';
	location.href = page;
}
</script>

<div id="header" class="header">
	<img src="..\images\logo.jpg" alt="logo" height="93%"/>
	<?php echo $_SESSION['alias'] ;?>
	<input type="button" value="Salir" id="btnSalir" name="btnSalir" class="boton" onclick ='javascript:Salir()'/> 
</div>

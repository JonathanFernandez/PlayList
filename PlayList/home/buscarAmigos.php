<?php
	session_start();
?>
<!	DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Buscar Amigos</title>
<script type="text/javascript" src="../jQuery/jquery-1.9.1.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
<link rel="stylesheet" type="text/css" href="../css/menuStyles.css"/>
<script src="../jQuery/1.10.3jquery-ui.js"></script>

<script type="text/javascript">
$(function() {
    $( "#menu" ).menu();
  });
$(function() {
    $( "#accordion" ).accordion();
  });

</script>
<?php 
	/*if(isset($_POST['bntOrdenar']))
	{
		$orderBy = "order by ".$_POST['ordenar'];
		//return false;
	}
	else
	{
		$orderBy = "order by nombre";
		//return false;
	}
	*/
	
	
?>
</head>
<body>
<form action="" method="post" enctype="" onsubmit="">
<table border="0" style="width:100%;">
	<tr>
		<td colspan="2">
			<?php include ('headerMenu.php'); ?>
		</td>
	</tr>
	<tr>
		<td style="width:20%;">
			<?php include ('menu.php'); ?>
		</td>
		<td>
			<div id="divBuscarAmigos">
				<table>
					<?php include('listarBuscarAmigos.php'); ?>
				</table>
			</div>
				     
		</td>
	</tr>

</table>

</div>

</form>
</body>
</html>
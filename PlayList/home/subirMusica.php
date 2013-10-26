<?php
	session_start();
?>
<!	DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>CrearPlayList</title>
<script type="text/javascript" src="../jQuery/jquery-1.9.1.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
<link rel="stylesheet" type="text/css" href="../css/menuStyles.css"/>
<script src="../jQuery/1.10.3jquery-ui.js"></script>

<script type="text/javascript">
</script>

</head>
<body>
<form action="" method="post">
<?php
	$status = "";
if ($_POST["action"] == "upload") {
    // obtenemos los datos del archivo
    $tamano = $_FILES["archivo"]['size'];
    $tipo = $_FILES["archivo"]['type'];
    $archivo = $_FILES["archivo"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);
   
    if ($archivo != "") {
        // guardamos el archivo a la carpeta files
        $destino =  "../files/".$prefijo."_".$archivo;
		if (copy($_FILES['archivo']['tmp_name'],$destino)) {
            $status = "Archivo subido: <b>".$archivo."</b>";
        } else {
            $status = "Error al subir el archivo";
        }
    } else {
        $status = "Error al subir archivo";
    }
	$trozos = explode(".", $archivo); 
	$extension = end($trozos); 
	
	
	if($extension != 'mp3' && $extension != 'MP3')
	{
		$_SESSION['finish'] = 1;
		header("location:crearMusica.php");
	}
}
	
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
	$sql_query = "insert into musica(nombre, cod_genero,artista, path, album)
					  values('".$_POST['nombre']."','".$_POST['genero']."','".$_POST['artista']."','".$destino."','".$_POST['album']."')";
	
	$query = mysql_query($sql_query,$conn);
	mysql_close($conn);
	$_SESSION['finish'] = 2;
	header("location:crearMusica.php");
?>
</form>
</body>
</html>
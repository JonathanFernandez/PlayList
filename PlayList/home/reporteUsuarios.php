<?php
	session_start();
	require('../fpdf/fpdf.php');

	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',10);
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
	$sql_query ="select u.code, u.nombre, u.apellido, u.email , u.log from usuario u where cod_tipousuario = 2";
	$query = mysql_query($sql_query,$conn);
	$filas = mysql_num_rows($query);
	$pdf->Cell(40,10,'Usuarios');
	$pdf->Ln();
	if($filas>0)
		{
			while($resultado = mysql_fetch_array($query))
			{
				if($resultado['log']== 1)
					$log="Conectado";
				else
					$log="Desconectado";
				$pdf->Cell(40,10,$resultado['code']."-	".$resultado['nombre'].",	".$resultado['apellido'].". 	".
									$resultado['email']."		".$log);
				$pdf->Ln();
			}
		}
		
		mysql_close($conn);
	
	
	$pdf->Output();
?>
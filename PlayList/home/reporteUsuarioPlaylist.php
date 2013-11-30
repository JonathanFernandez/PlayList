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
	
	$pdf->Cell(40,10,'Usuarios y sus playlist');
	$pdf->Ln();
	if($filas>0)
	{
		while($resultado = mysql_fetch_array($query))
		{	
			$pdf->Cell(40,10,$resultado['code']."-	".$resultado['nombre'].",	".$resultado['apellido'].". 	".$resultado['email']);
			$pdf->Ln();
			
			$sql_query2 ="select * from playlist where cod_usuario = ".$resultado['code'];
			$query2 = mysql_query($sql_query2,$conn);
			$filas2 = mysql_num_rows($query2);
			
			while($resultado2 = mysql_fetch_array($query2))
			{
				$pdf->Cell(40,10,"           ".$resultado2['nombre']);
				$pdf->Ln();
			}
			$pdf->Cell(40,10,'-----------------------------------------------------------------------------------------------------------------------------------------------------');
			$pdf->Ln();
		}
	}
		
		mysql_close($conn);
	
	
	$pdf->Output();
?>
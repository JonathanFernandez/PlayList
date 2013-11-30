<?php
	session_start();
	require('../fpdf/fpdf.php');

	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',10);
	$conn = mysql_connect("127.0.0.1","root","") or die ("no se puede conectar");
	mysql_select_db("playlist",$conn) or die;
	
	$sql_query ="select
					rpl.cod_playlist, pl.nombre ,sum(meGusta) - (noMegusta) as cant, u.alias
				from 
					rankingplaylist rpl
				inner join playlist pl on
					pl.code = rpl.cod_playlist and
					pl.cod_privacidad = 1
				inner join usuario u on
					u.code = pl.cod_usuario
				group by rpl.cod_playlist 
				order by 3 desc, pl.nombre";
	$query = mysql_query($sql_query,$conn);
	$filas = mysql_num_rows($query);
	
	$pdf->Cell(40,10,'Ranking playlist');
	$pdf->Ln();
	if($filas>0)
	{
		while($resultado = mysql_fetch_array($query))
		{	
			$pdf->Cell(40,10,$resultado['cod_playlist']."-		".$resultado['nombre'].",	".$resultado['alias']." 	votos = ".$resultado['cant']);
			$pdf->Ln();
		}
	}
		
		mysql_close($conn);
	
	
	$pdf->Output();
?>
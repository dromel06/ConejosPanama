<?php 
	include 'plantillapdf.php';
	require_once("../class/conejos.php");

	$obj_conejos = new conejo();
	$resultado = $obj_conejos->consultar_reserva($_POST['estado']);

	$pdf = new PDF();
	$pdf->cambiar_estado($_POST['estado']);
	$pdf->AliasNbPages();
	$pdf->AddPage();
	


	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,6,'Nombre',1,0,'C',1);
	$pdf->Cell(30,6,'Ubicacion',1,0,'C',1);
	$pdf->Cell(30,6,'Celular',1,0,'C',1);
	$pdf->Cell(20,6,'Codigo',1,0,'C',1);
	$pdf->Cell(20,6,'Sexo',1,0,'C',1);
	$pdf->Cell(20,6,'Precio',1,1,'C',1);

	
	$pdf->SetFont('Arial','',10);
	
	#while($row = $resultado->fetch_assoc())
	#{
	foreach ($resultado as $row) {
		$pdf->Cell(30,6,utf8_decode($row['nombre']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['ubicacion']),1,0,'C');
		$pdf->Cell(30,6,$row['tel'],1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['codigo']),1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['sexo']),1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['precio']),1,1,'C');
	}
	$pdf->Output();
?>

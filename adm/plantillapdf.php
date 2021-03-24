<?php
	require 'fpdf/fpdf.php';

	 class PDF extends FPDF{
	 	private $estado;

	 	function cambiar_estado($es){
			$this->estado = 'Reporte de '. $es;	 		
	 	}
	 	function Header(){
	 		$this->Image('../Imagenes/ConejosPanamaIcon.png',40, 5, 18);
	 		$this->Image('../Imagenes/ConejosPanamaIcon.png', 145, 5, 18);
	 		$this->SetFont('Arial', 'B', 15);
	 		$this->Cell(30);
	 		$this->Cell(120,10, $this->estado,0,0,'C');
			$this->Ln(20);
	 	}

	 	function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}	
	 }
?>
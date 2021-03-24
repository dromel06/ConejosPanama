<?php 
	require_once("../class/conejos.php");
	$obj_conejos = new conejo();
	if(isset($_POST["export_reserva"])){
	    header("Pragma: public");
        header("Expires: 0");
		$developer_records =  $obj_conejos->consultar_reserva($_POST['estado']);
		$filename = "ConejosVendidos_".date('Ymd'). ".xls";
		header("Content-type: application/x-msdownload");
        header("Content-Disposition: attachment; filename=$filename");
        header("Pragma: no-cache");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

		#header("Content-Type: application/vnd.ms-excel");
		#header("Content-Disposition: attachment; filename=$filename");
		$show_columns = false;
		if(!empty($developer_records)){
			foreach ($developer_records as $record) {
				if(!$show_columns){
					echo implode("\t", array_keys($record)). "\n";
					$show_columns = true;
				}
				echo implode("\t", array_values($record)) . "\n";
			}
		}
		exit;
	}
?>
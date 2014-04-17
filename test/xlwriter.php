<?php
/*Sarath*/
require_once '../Classes/PHPExcel.php';
$inputFileName = 'Book2.xlsx';
try{
	//Loading Excell file
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

	//Change cells in memory
	$objPHPExcel->getActiveSheet()->setCellValue('A1',date('M-d-Y'));
	$objPHPExcel->getActiveSheet()->setCellValue('A2',"Category name");
	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
	//var_dump($objWriter);
	$objWriter->save("Book2.xlsx");


}
catch(PHPExcel_Reader_Exception $e) {
    die('Error loading file: '.$e->getMessage());
}
?>

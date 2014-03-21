<?php
require_once '../Classes/PHPExcel.php';
$inputFileName = 'Book2.xlsx';
try{
	//Loading Excell file
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

	//Change cells in memory
	$objPHPExcel->getActiveSheet()->setCellValue('A1',date('M-d-Y'));
	$objPHPExcel->getActiveSheet()->setCellValue('A2',"New Category name");
	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
	//var_dump($objWriter);
	//$objWriter->save("Book2.xlsx");
	if(isset($_GET['get'])){
		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="01simple.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}


}
catch(PHPExcel_Reader_Exception $e) {
    die('Error loading file: '.$e->getMessage());
}
?>
<?php
/*
This example iterate rows in a excel file and get Cell values 
*/
function sanitize_string($string){
	return filter_var($string,FILTER_SANITIZE_STRING);
}
function filter_string($string){
	$string=sanitize_string($string);
	if(strlen($string)>0){
		return $string;
	}
	return FALSE;

}
require_once '../Classes/PHPExcel.php';
$inputFileName = 'Book2.xlsx';
try{
	//Loading Excell file
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

	$objWorksheet = $objPHPExcel->getActiveSheet();



echo '<tr><td colspan="3"> Category: '.$objPHPExcel->getActiveSheet()->getCell('A1').'</td></tr>';
$count=1;
$batch_data=array();
foreach ($objWorksheet->getRowIterator(5) as $row) {
		
  $cellIterator = $row->getCellIterator();
  $cellIterator->setIterateOnlyExistingCells(false); // This loops all cells,
  echo '<br>';
  		//@hacks
  			$rowIndex = $row->getRowIndex ();
  			echo $rowIndex;
			$cell_pname = filter_string($objWorksheet->getCell('A' . $rowIndex));
			$cell_pkey = filter_string($objWorksheet->getCell('B' . $rowIndex));
			$cell_pdesc = filter_string($objWorksheet->getCell('C' . $rowIndex))	;
			if($cell_pname && $cell_pkey && $cell_pdesc)
			{
				echo ' | '.$cell_pname.' | '.$cell_pkey.' | '.$cell_pdesc;
				$batch_data['product_name'][]=$cell_pname;
				$batch_data['product_keyword'][]=$cell_pkey;
				$batch_data['product_description'][]=$cell_pdesc;
			}

  		//End @hacks

  $count++;
}
var_dump($batch_data);


	


}
catch(PHPExcel_Reader_Exception $e) {
    die('Error loading file: '.$e->getMessage());
}
?>
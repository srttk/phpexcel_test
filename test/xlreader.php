<?php
require_once '../Classes/PHPExcel.php';
$inputFileName = 'Book2.xlsx';
try{
	//Loading Excell file
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

	$objWorksheet = $objPHPExcel->getActiveSheet();


echo '<table border="1px">' . "\n";
echo '<tr><td colspan="3"> Category: '.$objPHPExcel->getActiveSheet()->getCell('A1').'</td></tr>';
foreach ($objWorksheet->getRowIterator() as $row) {
  echo '<tr>' . "\n";
		
  $cellIterator = $row->getCellIterator();
  $cellIterator->setIterateOnlyExistingCells(false); // This loops all cells,
                                                     // even if it is not set.
                                                     // By default, only cells
                                                     // that are set will be
                                                     // iterated.
  foreach ($cellIterator as $cell) {
  	if($cell->getRow()>4 && $cell->getColumn()=='A'){
    	echo '<td>' . $cell->getValue() . ' <strong>'.$cell->getColumn().'-'.$cell->getRow() .'</strong> </td>' . "\n";
  	}
  	if($cell->getRow()>4 && $cell->getColumn()=='B'){
    	echo '<td>' . $cell->getValue() . ' <strong>'.$cell->getColumn().'-'.$cell->getRow() .'</strong> </td>' . "\n";
  	}
  	if($cell->getRow()>4 && $cell->getColumn()=='C'){
    	echo '<td>' . $cell->getValue() . ' <strong>'.$cell->getColumn().'-'.$cell->getRow() .'</strong> </td>' . "\n";
  	}
  }
  
  echo '</tr>' . "\n";
}
echo '</table>' . "\n";

	


}
catch(PHPExcel_Reader_Exception $e) {
    die('Error loading file: '.$e->getMessage());
}
?>
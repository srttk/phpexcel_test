<?php
require_once '../Classes/PHPExcel.php';
$inputFileName = 'Book2.xlsx';

$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
//echo $objPHPExcel->getActiveSheet()->setCellValue('A2', 'Some value');
if(isset($_POST['name'])){
	$objPHPExcel->getActiveSheet()->setCellValue('A1',date('M-d-Y'));
	$objPHPExcel->getActiveSheet()->setCellValue('A2',$_POST['name']);
	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
	$objWriter->save("Book2.xlsx");

}
$inputFileName = 'Book2.xlsx';

$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

echo $objPHPExcel->getActiveSheet()->getCell('A2')->getValue();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post">
<input type="text" name="name">
	<input type="submit" name="submit" />
</form>
</body>
</html>
<?php
$ff=array('one','tow');
echo implode(',',$ff);
?>
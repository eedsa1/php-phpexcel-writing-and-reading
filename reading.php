<?php 

require './PHPExcel/PHPExcel.php';

$arquivo=$_FILES['uploadfile']['tmp_name'];

$excelReader = PHPExcel_IOFactory::createReaderForFile($arquivo);

$excelObj = $excelReader->load($arquivo);
//if it not works use getSheet(number_index)
$worksheet = $excelObj->getActiveSheet();
//takes the lines total
$lastRow = $worksheet->getHighestRow();
//columns quantity
//$lastColumn = $worksheet->getHighestColumn();

//data
echo 'tabela';
echo '<table>';
for ($row = 1; $row <= $lastRow; $row++) {
    echo '<tr><td>';
    //"A" indica a celula da planilha
    echo $worksheet->getCell('A'.$row)->getValue();
    echo '</td><td>';
    echo $worksheet->getCell('B'.$row)->getValue();
    echo '</td></tr>';
}
echo '</table>';

//parameters
//transform a worksheet into array
//1º null specify the return case the cell does note exist
//2º true indicate if formulas must be calculated
//3º true indicate if the format of cell must be applied to the data returned
//ex: 1246,00 if the decimal format is "2"
//4º true indicate if the index of array will be a simple number or the actual number of cell
//ex: array[1]['A'] ou array[0][0]
$excel_array = $worksheet->toArray(null, true, true, true);
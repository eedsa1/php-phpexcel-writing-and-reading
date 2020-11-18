<?php 

require 'PHPExcel/Classes/PHPExcel.php';

$arquivo=$_FILES['uploadfile']['tmp_name'];

$excelReader = PHPExcel_IOFactory::createReaderForFile($arquivo);

$excelObj = $excelReader->load($arquivo);
//caso não funcione usar getSheet(numero_indice)
$worksheet = $excelObj->getActiveSheet();
//pega a quantidade de linhas
$lastRow = $worksheet->getHighestRow();
//quantidade de colunas
//$lastColumn = $worksheet->getHighestColumn();

//dados
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

//parâmetros
//para transformar o worksheet num array
//1º null primeiro para especificar o retorno caso a celula não exista
//2º true indica se formulas deverão ser calculadas
//3º true para indicar se o formato da celula deverá ser aplicado para os dados retornados
//ex: 1246,00 se o formato decimal for 2
//4º true indica se o indice do array vai ser um simples numero ou o numero atual da celula
//ex: array[1]['A'] ou array[0][0]
$excel_array = $worksheet->toArray(null, true, true, true);
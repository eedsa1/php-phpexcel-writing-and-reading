<?php

    require './PHPExcel/PHPExcel.php';

    $excel = new PHPExcel();

    $excel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'teste')
        ->setCellValue('B1', 'teste');
    
    //redirect to browser (download)
    //if you need use xls format
    //header('Content-Type: application/vnd.vnd.ms-excel');
    //header('Content-Disposition: attachment;filename="test.xls"');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="test.xlsx"');
    header('Cache-Control: max-age=0');

    $file = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    //to use xls
    //$file = PHPExcel_IOFactory::createWriter($excel, 'Excel5');

    $file->save('php://output');

    // // Redirect output to a client’s web browser (Excel5)
    // header('Content-Type: application/vnd.ms-excel');
    // header('Content-Disposition: attachment;filename='.$filename);
    // header('Cache-Control: max-age=0');

    // // If you're serving to IE 9, then the following may be needed
    // header('Cache-Control: max-age=1');

    // // If you're serving to IE over SSL, then the following may be needed
    // header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    // header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    // header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    // header ('Pragma: public'); // HTTP/1.0

    // $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    // $objWriter->save('php://output');
    // exit;
?>

<?php

    require './PHPExcel/PHPExcel.php';

    //database connection (mysql)
    $con = mysqli_connect("localhost", "root", "", "PHPExcelTest");
    if(!$con) {
        echo mysqli_error($con);
    }

    $excel = new PHPExcel();

    //selecting the active sheet
    $excel->setActiveSheetIndex(0);

    //execute statement to get the data
    $query = mysqli_query($con, "select * from Clients");
    //from row 4 to forward insert the data
    $row = 4;
    while($data = mysqli_fetch_object($query)) {
        $excel->getActiveSheet()
            ->setCellValue('A' . $row, $data->ClientId)
            ->setCellValue('B' . $row, $data->ClientName)
            ->setCellValue('C' . $row, $data->Address)
            ->setCellValue('D' . $row, $data->Phone);
        $row++; 
    }

    //set column width
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);

    //create the headers
    $excel->getActiveSheet()
        ->setCellValue('A1', 'List of clients')
        ->setCellValue('A3', 'ID')
        ->setCellValue('B3', 'Name')
        ->setCellValue('C3', 'Address')
        ->setCellValue('D3', 'Phone');

    //merges the title
    $excel->getActiveSheet()->mergeCells('A1:D1');

    //set the aligning
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');    

    //styling
    $excel->getActiveSheet()->getStyle('A1')->applyFromArray(
        array(
            'font' => array(
                'size' => 24,
            )
        )
    );
    $excel->getActiveSheet()->getStyle('A3:D3')->applyFromArray(
        array(
            'font' => array(
                'bold' => true,
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        )
    );
    $excel->getActiveSheet()->getStyle('A4:D' . ($row-1))->applyFromArray(
        array(
            'borders' => array(
                'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                ),
                'vertical' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        )
    );
    //OBS: borders can be allborders, outline, diagonal, horizontal etc
    //check the documentation for references

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="test.xlsx"');
    header('Cache-Control: max-age=0');

    $file = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    //to use xls
    //$file = PHPExcel_IOFactory::createWriter($excel, 'Excel5');

    $file->save('php://output');
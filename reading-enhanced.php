<?php 

    require './PHPExcel/PHPExcel.php';

    //combine with file upload
    if(empty($_FILES)) {
        echo "You must select a file";
    }
    else {
        //to load local file
        //$excel = PHPExcel_IOFactory::load('test.xlsx');
        //with file upload
        $excel = PHPExcel_IOFactory::load($_FILES['excel']['tmp_name']);

        //active sheet
        $excel->setActiveSheetIndex(0);

        echo "<table border=1>";

        //first row
        $i = 4;
        
        while ($excel->getActiveSheet()->getCell('A' . $i)->getValue() != "") {
            //cells value
            $id = $excel->getActiveSheet()->getCell('A' . $i)->getValue();
            $name = $excel->getActiveSheet()->getCell('B' . $i)->getValue();
            $address = $excel->getActiveSheet()->getCell('C' . $i)->getValue();
            $phone = $excel->getActiveSheet()->getCell('D' . $i)->getValue();

            echo "
                <tr>
                    <td>" . $id . "</td>
                    <td>" . $name . "</td>
                    <td>" . $address . "</td>
                    <td>" . $phone . "</td>
                </tr>
            ";

            $i++;
        }

        echo "</table>";
    }

?>

    
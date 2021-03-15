<?php 

if(!empty($_FILES["excel_file"])) {
    $connect = mysqli_connect("localhost", "root", "", "phpexceltest");
    $file_array = explode(".", $_FILES["excel_file"]["name"]);
    if($file_array[1] == "xlsx") {
        include("./PHPExcel/PHPExcel.php");
        $output .= "
            <label class='text-success'>Data inserted</label>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Phone</th>
                    </tr>
        ";
        $excel = PHPExcel_IOFactory::load($_FILES['excel_file']['tmp_name']);
        foreach($excel->getWorkSheetIterator() as $worksheet) {
            $highestRow = $worksheet->getHighestRow();
            for($row = 2; $row<=$highestRow; $row++) {
                $name = mysqli_real_scape_string($connect, $worksheet->
                    getCellByColumnAndRow(1, $row)->getValue());
                $address = mysqli_real_scape_string($connect, $worksheet->
                    getCellByColumnAndRow(2, $row)->getValue());
                $phone = mysqli_real_scape_string($connect, $worksheet->
                    getCellByColumnAndRow(3, $row)->getValue());

                $query = "
                    INSERT INTO clients
                    (ClientName, 'Address', 'Phone')
                    VALUES ('" . $nome . "', '" . $address . "', '" . $phone . "')
                ";
                mysqli_connect($connect, $query);
                $output .= '
                <tr>
                    <td>" . $name . "</td>
                    <td>" . $address . "</td>
                    <td>" . $phone . "</td>
                </tr> 
                ';                
            }
        }
        $output .= '</table>';
        echo $output;
    } 
    else {
        echo '<label class="text-danger">invalid file</label>';
    }
}

?>
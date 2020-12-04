<?php 

echo "<form method='post' action='reading.php' enctype='multipart/form-data'>
        <div class='form-group row'>
            <h2>Select File</h2>
            <div class='col-md-8'>
                <input type='file' name='uploadfile' class='form-control'/>
            </div>
        </div>
        <div class='form-group row'>
            <label class='col-md-3'></label>
            <div class='col-md-8'>
                <input type='submit' name='submit' class='btn btn-primary'>
            </div>
        </div>
        </form>";

echo "
    </br>
    <h2>Enhanced version</h2>";
echo "
    <form method='post' enctype='multipart/form-data' action='reading-enhanced.php'>
        <input type='file' name='excel'>
        </br>
        <button type='submit'>Fetch data</button>
    </form>";



<html>
    <head>
        <title>Export excel file from mysql database</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container-box">
            <h3>Export excel from database with AJAX</h3>
            <br/>
            <form method="post" id="export_excel">
                <label>Select Excel</label>
                <input type="file" name="excel_file" id="excel_file"/>
            </form>
            <br/>
            <div id="result">
            </div>
        </div>
    </body>
</html>
<script>
    $(document).ready(function(){
        alert('awdawd');
        $('#excel_file').change(function(){
            $('#export_excel').submit();
        });
        $('#export_excel').on('submit', function(event){
            event.preventDefault();
            $ajax({
                url: "export.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data){
                    $('#result').html(data);
                    $('#excel_file').val('');
                }
            })
        });
    });
<script>
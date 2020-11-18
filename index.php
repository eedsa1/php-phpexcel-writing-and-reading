<?php 

echo '<form method="post" action="reading.php" enctype="multipart/form-data">';
echo '<div class="form-group row">';
echo '<label class="col-md-3">Select File</label>';
echo '<div class="col-md-8">';
echo '<input type="file" name="uploadfile" class="form-control"/>';
echo '</div>';
echo '</div>';
echo '<div class="form-group row">';
echo '<label class="col-md-3"></label>';
echo '<div class="col-md-8">';
echo '<input type="submit" name="submit" class="btn btn-primary">';
echo '</div>';
echo '</div>';
echo '</form>';
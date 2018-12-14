<?php
$source = 'uploads/';
$file_Path = glob("uploads/*.*");


foreach ($file_Path as $file) {
    print_r($file);
    $x = explode("/", $file);
    $destination = 'backupimg/' . $x[1];
    $c = copy($file, $destination); //copy(sourcefolder,destination folder)
}
if ($c) {
    echo "<br> . files coppied";
} else { 
    echo "fail to copy";
}
?>
<html>
    <meta http-equiv="refresh" content="30"/>
</html>
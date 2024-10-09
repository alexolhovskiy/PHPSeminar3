<?php

$res=[];
$a_file='file.txt';
    
if(file_exists($a_file)&&is_readable($a_file)){
    $file = fopen($a_file, 'r');
    while(!feof($file)){
        $res[] = fgets($file);
    }
    fclose($file);
    echo json_encode($res);
}else{
    echo "error!";
}

?>
<?php

if(isset($_GET['name'])){
    echo "set";
    print_r($_GET);
    $name=$_GET['name'];
    $date=$_GET['date'];
}

$address = 'file.txt';


if(validate($date)){
    $data = $name . ", " . $date . "\r\n";

    $fileHandler = fopen($address, 'a');
    
    if(fwrite($fileHandler, $data)){
        echo "Запись $data добавлена в файл $address";
    }
    else {
        echo "Произошла ошибка записи. Данные не сохранены";
    }
    
    fclose($fileHandler);
}
else{
    echo "Введена некорректная информация";
}


function validate(string $date): bool {
    $dateBlocks = explode("-", $date);
    if(count($dateBlocks)==3){
        if(checkdate((int)$dateBlocks[1],(int)$dateBlocks[0],(int)$dateBlocks[2])){
            return true;
        }
    }
    
    return false;
}

<?php


if(isset($_GET['confirm'])){
    $res=[];
    $dataString=$_GET['data2'];
    //     var_dump($dateString);
    
    $a_file='file.txt';
    
    if(file_exists($a_file)&&is_readable($a_file)){
        $file = fopen($a_file, 'r');
        while(!feof($file)){
            $data = fgets($file);
            $arr=explode(", ",$data);
            if(count($arr)>1){
                if($arr[0]!==$dataString && $arr[1]!==$dataString){
                    $res[]=$data;  
                }
            }
        }
        fclose($file);
        $file = fopen($a_file, 'w');
        if ($file === false) {
            echo "Не удалось открыть файл для записи: $a_file";
            return;
        }
        foreach ($res as $line) {
            fwrite($file, $line . PHP_EOL); // Записываем строку и добавляем перевод строки
        }
        fclose($file);
    }
    echo "done";
}



if(isset($_GET['data'])){
    
    $dataString=$_GET['data'];
    //     var_dump($dateString);
    
    $a_file='file.txt';
    
    if(file_exists($a_file)&&is_readable($a_file)){
        $file = fopen($a_file, 'r');
        
        while(!feof($file)){
            $data = fgets($file);
            
            $arr=explode(", ",$data);

            if(count($arr)>1){
                if($arr[0]==$dataString|| $arr[1]===$dataString){
                    echo "yes";
                    return;
                }
            }
            
        }
        fclose($file);
    }
    echo "no";
}



?>
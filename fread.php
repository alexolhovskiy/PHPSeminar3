<?php

if(isset($_GET['date'])){
    $res=[];
    
    $dateString=$_GET['date'];
//     var_dump($dateString);
    
    if(validate($dateString)){
        $date = DateTime::createFromFormat('d-m-Y', $dateString);

        $a_file='file.txt';
        
        if(file_exists($a_file)&&is_readable($a_file)){
            $file = fopen($a_file, 'r');
            while(!feof($file)){
                $data = fgets($file);
                $arr=explode(", ",$data);
                if(count($arr)>1&&validate($arr[1])){
                    $f_date = DateTime::createFromFormat('d-m-Y',trim($arr[1]));
                    if ($f_date !== false) {
                        if($date->format('m')===$f_date->format('m')&&
                            $date->format('d')===$f_date->format('d')){
                                $res[]=$arr[0]." Has bparty today!";
                        } 
                    }
                }
            }
            fclose($file);
        }
    }else{
        echo "Введена некоректная дата!<br>";
    }  
    
    echo json_encode($res);
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


?>
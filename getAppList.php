<?php
    header("Access-Control-Allow-Origin: *");

    $dir          = "./DIRECTORY"; //path
    $list = array(); //main array

    if(is_dir($dir)){
        if($dh = opendir($dir)){
            while(($file = readdir($dh)) != false){

                if($file == "." or $file == ".."){
                    //...
                } else { //create object with two fields
                    $list3 = array(
                    'file' => $file, 
                    'size' => filesize($file));
                    if($_GET["type"]=="all"){
                        array_push($list, $list3);
                    }else{
                        if(file_get_contents("./DIRECTORY/".$file."/type")==$_GET['type']){
                            array_push($list, $list3);
                        }
                    }
                }
            }
        }

        $return_array = array('files'=> $list);

        echo json_encode($return_array);
    }

?>
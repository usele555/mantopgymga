<?php

if (!empty($_FILES)) {
    $temp = $_FILES['file']['tmp_name'];
    $dir_seperator = DIRECTORY_SEPARATOR;
    $folder = 'uploads';
    $destination_path = dirname(__FILE__).$dir_seperator.$folder.$dir_seperator;
    
    $img = $_FILES['file']['name'];
    $name = 'uploads/'.$_FILES['file']['name'];

    if (file_exists($name)) {
        $rand = rand(1, 10000).'.jpg';
        $img = substr($img, 0, -4);
        $name = substr($name, 0, -4);
        $img .= $rand;
        $name = "../".$name.$rand;
    }else{
        $name = "../".$name;
    }
    
    $target_path = $destination_path.$img;
    
    $_SESSION['img'] = $name;

    move_uploaded_file($temp, $target_path);
}

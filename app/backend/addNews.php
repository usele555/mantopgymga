<?php

if (!empty($_POST['title']) || !empty($_POST['text'])) {
    require_once 'conn.php';
  
    $img = $_SESSION['img'];

    if (!isset($_POST['title']) || !isset($_POST['text'])) {
        echo 'Error: Fyll i alla fält.';
        exit;
    } else {
        $title = strip_tags($_POST['title']);
        $text = $_POST['text'];

        $query = 'INSERT INTO news';
        $query .= '  VALUES (?, ?, ?, ?, ?);';
        $data = array(null, $title, $text, $img, null);
        echo "img".$img;
        runQuery($query, false, $data);
        $_SESSION['img'] = null;
    }
    header('Location: /admin/index');
} else {
    header('Location: /admin/index');
}

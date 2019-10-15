<?php

require_once 'conn.php';

$img = $_SESSION['img'];

if (!isset($_POST['name']) || !isset($_POST['text'])) {
    echo 'Error: Fyll i alla fält.';
    exit;
} else {
    $name = strip_tags($_POST['name']);
    $text = strip_tags($_POST['text']);

    $query = 'INSERT INTO pts';
    $query .= '  VALUES (?, ?, ?, ?, ?);';
    $data = array(null, $name, $text, $img, null);

    runQuery($query, false, $data);
    $_SESSION['img'] = null;
}
header('Location: /admin/pts');

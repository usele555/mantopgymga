<?php
require_once 'conn.php';

$img = $_SESSION['img'];

$query = 'INSERT INTO images';
$query .= '  VALUES (?, ?, ?);';
$data = array(null, $img, null);

runQuery($query, false, $data);
$_SESSION['img'] = null;

header('Location: /admin/index');

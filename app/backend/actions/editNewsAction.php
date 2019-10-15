<?php

require '../app/backend/conn.php';

$newsTitle = $_POST['newsTitle'];
$newsText = $_POST['newsText'];
$editId = $_POST['editId'];
$img = $_SESSION['img'];

$query = 'UPDATE news ';
$query .= 'set title = ?, text = ? ';
if (!empty($img)) {
    $query .= ', img = ? ';
}
$query .= ' WHERE id = ?';

if (!empty($img)) {
    $data = array($newsTitle, $newsText, $img, $editId);
} else {
    $data = array($newsTitle, $newsText, $editId);
}

runQuery($query, false, $data);
$_SESSION['img'] = null;

header('Location: /admin/index');

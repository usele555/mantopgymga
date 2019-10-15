<?php
require_once('../app/backend/conn.php');

$name = $_POST['name'];
$text = $_POST['text'];
// $tag = $_POST['tag'];
$editId = $_POST['editId'];

$query = "UPDATE training ";
$query .= "set title = ?, text = ? ";
$query .= " WHERE id = ?";

$data = array($name, $text, $editId);

runQuery($query, false, $data);

header('Location: /admin/training');
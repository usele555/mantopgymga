<?php
require("../app/backend/conn.php");

$deleteId = $_POST['deleteId'];
$deleteImg = $_POST['deleteImg'];
$deleteImg = explode("../", $deleteImg);

$query  = " DELETE";
$query .= " FROM news";
$query .= " WHERE id =?";

$data = array($deleteId);

runQuery($query, false, $data);
unlink("/home/ubuntu/workspace/public/".$deleteImg[1]);
$deleteImg = null;

header('Location: /admin/index');
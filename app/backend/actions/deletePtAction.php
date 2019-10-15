<?php
require_once('../app/backend/conn.php');

$deleteId = $_POST['deleteId'];

$query  = " DELETE";
$query .= " FROM pts";
$query .= " WHERE id =?";

$data = array($deleteId);

runQuery($query, false, $data);

header('Location: /admin/pts');
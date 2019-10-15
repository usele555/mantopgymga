<?php
require_once('../app/backend/conn.php');

$deleteId = $_POST['deleteId'];

$query  = " DELETE";
$query .= " FROM instructors";
$query .= " WHERE id =?";

$data = array($deleteId);

runQuery($query, false, $data);

header('Location: /admin/instructors');

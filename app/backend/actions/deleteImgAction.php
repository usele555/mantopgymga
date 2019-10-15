<?php

require '../app/backend/conn.php';

var_dump($_POST['deleteId']);

foreach ($_POST['deleteId'] as $id) {
    $query = ' DELETE';
    $query .= ' FROM images';
    $query .= ' WHERE id = ?';

    $data = array($id);
    $name = explode("../", $id);
    unlink('/home/ubuntu/workspace/public/'.$name[1]);
    
    runQuery($query, false, $data);
    $name = null;
}



header('Location: /admin/index');

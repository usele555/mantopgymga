<?php
require '../app/backend/conn.php';

if ($_POST["createTokenSubmit"]) {
    $tokenTimer = time();
    $token = bin2hex(random_bytes(5));
    // $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    
    $query= "UPDATE tokens SET token =?, tokenTimer=? where id=1;";
    $data = array($token, $tokenTimer);
    var_dump($data);
    runQuery($query, false, $data);
}
    header('Location: accountManager');

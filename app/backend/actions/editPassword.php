<?php

require '../app/backend/conn.php';

$userId = @$_SESSION['userId'];

// $oldpassword = md5(@$_POST['old-password']);
$newpassword = $_POST['new-password'];
$repeatnewpassword = $_POST['new-password-repeat'];

// $hashed_password = password_hash($_POST["old-password"],PASSWORD_DEFAULT);

$query = 'SELECT password FROM users WHERE id = ?';
$data = array($userId);
$oldpassworddb = runQuery($query, true, $data);
$pass = $oldpassworddb[0];

// $oldepassworddb = $row['password'];
if (password_verify($_POST['old-password'], $pass['password'])) {
    if ($newpassword == $repeatnewpassword) {
        //change password in db
        $hashed_password = password_hash($newpassword, PASSWORD_DEFAULT);
        $query = 'UPDATE users SET password = ? WHERE id = ?';
        $data = array($hashed_password, $userId);
        runQuery($query, false, $data);

        // echo "<script type='text/javascript'>
        // window.location.href = '/admin/accountManager/info#load-stuff';
        // </script>";

        // header('Location: /admin/accountManager');
    } else {
        header('Location: /admin/accountManager');
    }
} else {
    header('Location: /admin/accountManager');
}

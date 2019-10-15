<?php
    require '../app/backend/conn.php';
if (isset($_POST['submit_password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    if (strlen($password) < 6) {
        header('Location: /resetPasswordForm/shortpassword');
        echo 'Lösenordet måste innehålla minst 6 tecken';
        exit();
    } elseif (!preg_match('#[0-9]+#', $password)) {
        header('Location: /resetPasswordForm/nonumberpassword');
        echo 'Lösenordet måste innehålla minst en siffra.';
        exit();
    } elseif (!preg_match('#[A-Z]+#', $password)) {
        header('Location: /resetPasswordForm/nocapspassword');
        echo 'Password must include at least one CAPS!';
        exit();
    } elseif (!preg_match("#\W+#", $password)) {
        header('Location: /resetPasswordForm/nosymbolpassword');
        exit();
    
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    runQuery("update users set password=? where email=?", false, array($hashedPassword, $email));
    header('Location: /login');
}

else{
    echo "error!";
}

<?php

if (isset($_POST['signup-submit'])) {
    require '../app/backend/conn.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];
    $token = $_POST['token'];
    $query = 'SELECT * FROM users WHERE username=?';
    $usernameResults = runQuery($query, true, array($username));

    foreach ($usernameResults as $result) {
        if ($result['username'] == $username) {
            header('Location: /signup/duplicateusername');
            echo 'Error: Användernamnet finns redan';
            exit();
        }
    }

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($token)) {
        header('Location: /signup/invalidfield');
        $error = '';
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: /signup/invalidemail');
        echo 'Ange e-postadress i rätt format.';
        exit();
    } elseif (!preg_match('/^[a-zA-Z0-9]*$/', $username)) {
        header('Location: /signup/invalidusername');
        echo 'Ogilitigt lösenord. Använd bara stora och små bokstäver samt siffror';
        exit();
    } elseif ($password !== $passwordRepeat) {
        header('Location: /signup/passwordmatch');
        echo 'Lösenorden matchar inte';
        exit();
    } elseif (strlen($password) < 6) {
        header('Location: /signup/shortpassword');
        echo 'Lösenordet måste innehålla minst 6 tecken';
        exit();
    } elseif (!preg_match('#[0-9]+#', $password)) {
        header('Location: /signup/nonumberpassword');
        echo 'Lösenordet måste innehålla minst en siffra.';
        exit();
    } elseif (!preg_match('#[A-Z]+#', $password)) {
        header('Location: /signup/nocapspassword');
        echo 'Password must include at least one CAPS!';
        exit();
    } elseif (!preg_match("#\W+#", $password)) {
        header('Location: /signup/nosymbolpassword');
        exit();
    } else {
        $query = 'SELECT * FROM tokens;';
        $tokensResults = runQuery($query, true, array());
        foreach ($tokensResults as $result) {
            if ($token == $result['token'] && time() - $result['tokenTimer'] < 900) {
                // $query = 'SELECT * FROM users WHERE username=?';
                // $usernameResults = runQuery($query, true, array($username));

                // foreach ($usernameResults as $result) {
                //     if ($result['username'] == $username) {
                //         echo 'Error: Användernamnet finns redan';
                //         exit();
                //     }
                // }
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $query = 'INSERT INTO users';
                $query .= '  VALUES (?, ?, ?, ?, ?, ?);';
                $data = array(null, $username, $email, $hashedPassword, 0, null);
                runQuery($query, false, $data);
                header('Location: /signup/success');
            } else {
                header('Location: /signup/tokenerror');
            }
        }
    }
} else {
    header('Location: /signup');
}

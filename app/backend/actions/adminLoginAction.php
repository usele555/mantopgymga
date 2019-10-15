<?php

if (isset($_POST['signin-submit'])) {
    require '../app/backend/conn.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header('Location: /admin');
        exit();
    } else {
        $query = 'SELECT * FROM users WHERE username=? OR email=?';
        $results = runQuery($query, true, array($username, $username));
        if ($results) {
            foreach ($results as $result) {
                if ($result['username']) {
                    $passwordCheck = password_verify($password, $result['password']);

                    if ($passwordCheck) {
                        session_start();
                        $_SESSION['userId'] = $result['id'];
                        $_SESSION['username'] = $result['username'];
                        $_SESSION['admin_access'] = $result['admin_access'];
                        header('Location: /admin/index');
                        exit();
                    } else {
                        header('Location: /login/wrongpassword');
                    }
                }
            }
        } else {
            header('Location: /login/nousername');
        }
    }
} else {
    header('Location: /index');
}

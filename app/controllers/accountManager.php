<?php
//  && 1 == $_SESSION['admin_access']
if (isset($_SESSION['userId'])) {
    require '../app/backend/conn.php';
    require '../vendor/autoload.php';
    $loader = new Twig_Loader_Filesystem('../app/views');
    $twig = new Twig_Environment($loader);

    $query = 'SELECT * FROM users';
    $users = runQuery($query, true, array(false));
    
    $query = 'SELECT * FROM users where id = ?';
    $data = $_SESSION['userId'];
    $active = runQuery($query, true, array($data));

    $query = 'SELECT * FROM users where admin_access = 0';
    $admins = runQuery($query, true, array(false));

    $query = 'SELECT * FROM tokens';
    $tokens = runQuery($query, true, array(false));
    // $t = null;
    
    // foreach ($tokens as $token) {
    //     if (time() - $token["tokenTimer"]<900) {
    //         $t = $token;
    //     }
    // }
    

    echo $twig->render('accountManager.html', array(
    'users' => $users,
    'tokens' => $tokens,
    'active' => $active,
    'admins' => $admins,
    'admin_access' => $_SESSION['admin_access']
));
} else {
    header('Location: /loginRequired');
}

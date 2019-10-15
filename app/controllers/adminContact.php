<?php

if (isset($_SESSION['userId'])) {
    require '../vendor/autoload.php';
    $loader = new Twig_Loader_Filesystem('../app/views');
    $twig = new Twig_Environment($loader);

    echo $twig->render('adminContact.html', array(
    'admin_access' => $_SESSION['admin_access']));
} else {
    header('Location: /loginRequired');
}

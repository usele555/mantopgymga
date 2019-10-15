<?php
require ('../vendor/autoload.php');
require '../app/backend/conn.php';
$loader = new Twig_Loader_Filesystem('../app/views');
$twig = new Twig_Environment($loader);

$query  = "SELECT * FROM users";
$credentials=runQuery($query, true, array(false));

echo $twig->render("signup.html", array(
    'error' => $error,
));

?>

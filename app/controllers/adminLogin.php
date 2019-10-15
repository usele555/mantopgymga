<?php
require ('../vendor/autoload.php');
require '../app/backend/conn.php';
$loader = new Twig_Loader_Filesystem('../app/views');
$twig = new Twig_Environment($loader);

$query  = "SELECT * FROM users";
$credentials=runQuery($query, true, array(false));
echo $twig->render("adminLogin.html", array(
    'error' => $error));
// get data END
?>

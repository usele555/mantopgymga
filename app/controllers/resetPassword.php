<?php
require ('../vendor/autoload.php');
require '../app/backend/conn.php';
$loader = new Twig_Loader_Filesystem('../app/views');
$twig = new Twig_Environment($loader);

echo $twig->render("resetPassword.html");
// get data END
?>

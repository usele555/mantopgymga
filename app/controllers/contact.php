<?php
require '../vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('../app/views');
$twig = new Twig_Environment($loader);

echo $twig->render("contact.html");

?>

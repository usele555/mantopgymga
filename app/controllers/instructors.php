<?php
require_once '../vendor/autoload.php';
require_once '../app/backend/conn.php';

$loader = new Twig_Loader_Filesystem('../app/views');
$twig = new Twig_Environment($loader);

$query  = 'SELECT * FROM instructors';
$pts = runQuery($query, true, array(false));

echo $twig->render("instructors.html", array(
    "actives"=>$pts,
    "pts"=>$pts
));


<?php
require_once '../vendor/autoload.php';
require_once '../app/backend/conn.php';

$loader = new Twig_Loader_Filesystem('../app/views');
$twig = new Twig_Environment($loader);

$query  = 'SELECT * FROM pts ';
$pts = runQuery($query, true, array(false));

$query  = 'SELECT * FROM content where tag = ?';
$data = 'pts';
$contents = runQuery($query, true, array($data));

echo $twig->render("pts.html", array(
    "pts"=>$pts,
    'contents' => $contents
));


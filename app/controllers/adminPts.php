<?php
require_once '../vendor/autoload.php';
require_once '../app/backend/conn.php';

$loader = new Twig_Loader_Filesystem('../app/views');
$twig = new Twig_Environment($loader);

$query  = 'SELECT * FROM pts';
$pts = runQuery($query, true, array(false));

$query  = 'SELECT * FROM content where tag = ?';
$data = 'pts';
$contents = runQuery($query, true, array($data));

echo $twig->render("adminPts.html", array(
    "pts"=>$pts,
    'contents' => $contents,
    'admin_access' => $_SESSION['admin_access']
));


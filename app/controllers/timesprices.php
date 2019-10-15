<?php
require '../vendor/autoload.php';
require '../app/backend/conn.php';
$loader = new Twig_Loader_Filesystem('../app/views');
$twig = new Twig_Environment($loader);

$query = 'SELECT * FROM content where tag=?';
$data = 'times';
$times = runQuery($query, true, array($data));

$query = 'SELECT * FROM content where tag=?';
$data = 'prices';
$prices = runQuery($query, true, array($data));


echo $twig->render('timesprices.html', array(
    'times' => $times,
    'prices' => $prices,
));
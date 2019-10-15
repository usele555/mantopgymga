<?php

require '../vendor/autoload.php';
require '../app/backend/conn.php';
$loader = new Twig_Loader_Filesystem('../app/views');
$twig = new Twig_Environment($loader);

// get data START
$query = 'SELECT * FROM news ORDER BY id DESC';
$current = runQuery($query, true, array(false));

$query = 'SELECT * FROM content where tag = ?';
$data = 'index';
$indexContent = runQuery($query, true, array($data));

$query = 'SELECT * FROM images';
$images = runQuery($query, true, array(false));

echo $twig->render('index.html', array(
    'current' => $current,
    'indexContent' => $indexContent,
    'images' => $images,
));
// get data END


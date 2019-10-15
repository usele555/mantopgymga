<?php
if (isset($_SESSION['userId'])) {
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

// $query = 'SELECT * FROM prices where tag=?';
// $data = 'type';
// $types = runQuery($query, true, array($data));

// $query = 'SELECT * FROM prices where tag=?';
// $data = 'length';
// $length = runQuery($query, true, array($data));


echo $twig->render('adminTimesprices.html', array(
    'times' => $times,
    'prices' => $prices,
    // 'types' => $types,
    // 'lengths' => $length,
    'admin_access' => $_SESSION['admin_access']
));
}
else{
    header("Location: loginRequired");
}
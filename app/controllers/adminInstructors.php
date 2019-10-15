<?php
if (isset($_SESSION['userId'])) {
require '../vendor/autoload.php';
require '../app/backend/conn.php';
$loader = new Twig_Loader_Filesystem('../app/views');
$twig = new Twig_Environment($loader);

$query  = 'SELECT * FROM instructors';
$pts = runQuery($query, true, array(false));

echo $twig->render("adminInstructors.html", array(
    "actives"=>$pts,
    "pts"=>$pts,
    'admin_access' => $_SESSION['admin_access']
));
}

else{
    header("Location: /loginRequired");
}

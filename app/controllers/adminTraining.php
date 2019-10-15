<?php

if (isset($_SESSION['userId'])) {
    require '../vendor/autoload.php';
    require '../app/backend/conn.php';
    $loader = new Twig_Loader_Filesystem('../app/views');
    $twig = new Twig_Environment($loader);

    $query = 'SELECT * FROM training where tag=?';
    $data = 'exp';
    $training = runQuery($query, true, array($data));

    $query = 'SELECT * FROM training where tag=?';
    $data = 'anm';
    $anm = runQuery($query, true, array($data));

    $query = 'SELECT * FROM training where tag=?';
    $data = 'nyb';
    $nyb = runQuery($query, true, array($data));

    $query = 'SELECT * FROM training';
    $all = runQuery($query, true, array($data));

    echo $twig->render('adminTraining.html', array(
    'training' => $training,
    'anm' => $anm,
    'parents' => $nyb,
    'all' => $all,
    'admin_access' => $_SESSION['admin_access']
));
} else {
    header('Location: /loginRequired');
}

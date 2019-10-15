<?php
require '../vendor/autoload.php';
require("../app/backend/conn.php");
$loader = new Twig_Loader_Filesystem('../app/views');
$twig = new Twig_Environment($loader);



echo $twig->render("test.html", array(
    

));


// echo "<br><b>NOT TWIG</b><br><br>";
// foreach ($current as $news) {
//     echo $news["title"]."<br>";
//     echo $news["text"]."<br>";
//     echo $news["created_at"]."<br><br>";
// }
// echo "<b>NOT TWIG</b><br>";








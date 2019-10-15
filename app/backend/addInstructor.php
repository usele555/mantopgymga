<?php

require_once 'conn.php';
// require_once "../../backend/HTMLPurifier/library/HTMLPurifier.auto.php";
// $purifier = new HTMLPurifier();

// $name_clean = $purifier->purify($_POST["name"]);
// $text_clean = $purifier->purify($_POST["text"]);

echo "Titel: '".$_POST['name']."'<br>";
echo "Text: '".$_POST['text']."'<br>";
// echo "Bild: '".$_FILES['fileToUpload']['name']."'<br>";
$img = $_SESSION['img'];

if (!isset($_POST['name']) || !isset($_POST['text'])) {
    echo 'Error: Fyll i alla fält.';
    exit;
} else {
    $name = strip_tags($_POST['name']);
    $text = strip_tags($_POST['text']);

    $query = 'INSERT INTO instructors';
    $query .= '  VALUES (?, ?, ?, ?, ?);';
    $data = array(null, $name, $text, $img, null);

    var_dump($data);

    runQuery($query, false, $data);
    $_SESSION['img'] = null;
}
header('Location: /admin/instructors');

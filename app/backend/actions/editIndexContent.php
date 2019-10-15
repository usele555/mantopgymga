<?php

require_once '../app/backend/conn.php';
require_once '../app/backend/HTMLPurifier/library/HTMLPurifier.auto.php';
$purifier = new HTMLPurifier();

if (!isset($_POST['indexContentText'])) {
    echo 'Error: Fyll i något i fältet!.';
    exit;
} else {
    $indexContentText_clean = $purifier->purify($_POST['indexContentText']);
    $indexContentId = $_POST['indexContentId'];

    $query = 'UPDATE content ';
    $query .= 'set text = ? ';
    $query .= ' WHERE id = ?';

    $data = array($indexContentText_clean, $indexContentId);

    runQuery($query, false, $data);
}

if (3 == $indexContentId || 2 == $indexContentId) {
    header('Location: /admin/timesprices');
} elseif (4 == $indexContentId) {
    header('Location: /admin/pts');
} else {
    header('Location: /admin/index');
}
// ",".$_POST[img].",".$_POST[created_at].

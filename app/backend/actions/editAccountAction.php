<?php
$accountId = $_POST['accountId'];
if ($accountId==1) {
    echo "Du kan inte ta bort huvudadministratörkontot";
    exit;
}

else{
    require("../app/backend/conn.php");
    $query  = " DELETE";
    $query .= " FROM users";
    $query .= " WHERE id =?";
    // echo $query;
    $data = array($accountId);
    
    runQuery($query, false, $data);
    
    header('Location: /admin/accountManager');
}
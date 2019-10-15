<?php
require ('../vendor/autoload.php');
require '../app/backend/conn.php';
$loader = new Twig_Loader_Filesystem('../app/views');
$twig = new Twig_Environment($loader);
if($_GET['key'] && $_GET['reset'])
{
  $email=$_GET['key'];
  $pass=$_GET['reset'];
  $select = runQuery("select email,password from users where md5(email)=? and md5(password)=?", true, array($email, $pass));
  if(md5($select[0]["email"])==$email && md5($select[0]["password"])==$pass){
      echo $twig->render("resetPasswordForm.html", array(
    'email' => $select[0]["email"]
    
    
    ));
  }
  else{
      echo "error!";
  }
}


?>

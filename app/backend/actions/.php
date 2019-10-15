<?php
ini_set('display_errors',1);
$mail=mail("oloahr642@edu.linkoping.se","Test","Test2","Header"); 


if($mail){
  echo "Thank you for using our mail form";
}else{
  echo "Mail sending failed."; 
}
<?php

header('Content-Type: text/html; charset=utf-8');
include "head.html";


session_start();
if ($_SESSION['loggued_on_user']){
 
        echo "Корзина пользователя " . $_SESSION['loggued_on_user']."\n";
        
        include "basket.html";


}
else
	echo "please sign in or sign up\n";
?>
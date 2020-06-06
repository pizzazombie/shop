<?php

header('Content-Type: text/html; charset=utf-8');
include "head.html";


session_start();
if ($_SESSION['loggued_on_user']){
 
        echo "Заказ пользователя " . $_SESSION['loggued_on_user']."\n";
        
        include "order.html";


}
else
	echo "please sign in or sign up\n";
?>

<?php
header('Content-Type: text/html; charset=utf-8');
include "head.html";


session_start();
if ($_SESSION['loggued_on_user']){
    if ($_SESSION['loggued_on_user'] == "admin")
    {
        echo "you are loged in as " . $_SESSION['loggued_on_user']."\n";
        include "admin_account.html";
    }
    else
    {
        echo "you are loged in as " . $_SESSION['loggued_on_user']."\n";
        include "account.html";
    }

}
else
	echo "please sign in or sign up\n";
?>
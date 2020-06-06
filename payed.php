<?php

header('Content-Type: text/html; charset=utf-8');
include "head.html";

if ($_POST['submit'] &&  $_POST['submit'] === "OK")
{
    echo "спасибо за ваш заказ!\n";
}
?>
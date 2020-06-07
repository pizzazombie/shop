<?php
// ДОБАВЛЯЮ КОННЕКТ К БД
require_once 'login.php';
$conn = new mysqli($hm, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

header('Content-Type: text/html; charset=utf-8');
include "head.html";

include "index.html";
?>

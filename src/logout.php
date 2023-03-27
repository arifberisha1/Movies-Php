<?php
ob_start();
session_start();

unset($_SESSION['user']);

$url = 'http://localhost/InternetPHP/PHPIndex.php?n=0&m=9&pnum=2';
header("Location: $url");

?>
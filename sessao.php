<?php
@session_start();
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
ini_set('default_charset','UTF-8');
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
// error_reporting(E_ALL);

$titulo='';
$information='';
?>
<?php
session_start();
echo 'hola1';

echo $_SERVER['DOCUMENT_ROOT'].'/php/escriuLogUsuari.php';
include  $_SERVER['DOCUMENT_ROOT'].'/php/escriuLogUsuari.php';

registraAccio("Logout", $_SESSION['usuario'], $_SESSION['rol'],  date('d-m-Y'),   date('H:i:s'));


unset($_SESSION['loggedin']);
unset($_SESSION['usuario']);
unset($_SESSION['rol']);
session_destroy();


$host = $_SERVER['HTTP_HOST'];
$html = 'usuariRegistrat.php';
$url = "http://$host/";
return header("Location:  $url");
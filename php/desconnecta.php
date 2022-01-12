<?php
session_start();
echo 'hola1';

echo $_SESSION['rol'];

if ($_SESSION['rol'] == "ADMIN") {

    function registraAccioad($nom, $accio,  $rol, $dia, $hora)
    {
        // ECHO "HOLA";

        $linia = "$nom - $accio  - $rol - Dia:$dia - Hora:$hora";

        $fichero = fopen("../../wwwjorgeAdmin/recursos/log/admin.log", "a");
        fwrite($fichero, $linia . PHP_EOL);
        fclose($fichero);
    }
    registraAccioad("Logout", $_SESSION['usuario'], $_SESSION['rol'],  date('d-m-Y'),   date('H:i:s'));
} else {

    include  $_SERVER['DOCUMENT_ROOT'] . '/php/escriuLogUsuari.php';

    registraAccio("Logout", $_SESSION['usuario'], $_SESSION['rol'],  date('d-m-Y'),   date('H:i:s'));
}

unset($_SESSION['loggedin']);
unset($_SESSION['usuario']);
unset($_SESSION['rol']);
session_destroy();


// // $host = $_SERVER['HTTP_HOST'];
// // $html = 'usuariRegistrat.php';
// // $url = "http://$host/";
// // return header("Location:  $url");

return header("Location: ../index.php");

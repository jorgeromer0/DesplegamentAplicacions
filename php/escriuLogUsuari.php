<?php

function registraAccio($accio, $email, $rol, $dia, $hora)
{
     // ECHO "HOLA";

     $linia = "$accio - $email - $rol - Dia:$dia - Hora:$hora";

     $fichero = fopen($_SERVER['DOCUMENT_ROOT']."/recursos/log/usuaris.log", "a");
     fwrite($fichero, $linia . PHP_EOL);
     fclose($fichero);
}


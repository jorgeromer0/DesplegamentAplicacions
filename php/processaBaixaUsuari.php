<?php

session_start();
$servidor = "192.168.1.41";
$usuari = "projectes_jorge";
$contrasenyabs = "projectes_jorge";
$base_dades = "projectes_jorge";
$connexio = mysqli_connect($servidor, $usuari, $contrasenyabs, $base_dades);

$usuario =     $_SESSION['usuario'];
$rol = $_SESSION['rol'];
$rol2 = $rol;

$sql = "SELECT * FROM $rol WHERE  email ='$usuario'";
$resultado = $connexio->query($sql);
$row = $resultado->fetch_assoc();

if ($rol = $_SESSION['rol'] == "alumnat") {
    $id = $row['idalum'];
    $nombre1 = "idalum";
} else {
    $id = $row['idprof'];
    $nombre1 = "idprof";
}

$sql = "delete from " . $rol2 . " where " . $nombre1 . "=$id";

if (mysqli_query($connexio, $sql)) {
    include  $_SERVER['DOCUMENT_ROOT'].'/php/escriuLogUsuari.php';


    registraAccio("Baixa", $usuario, $rol2,  date('d-m-Y'),   date('H:i:s'));
    echo "Registre actualitzat correctament";
    session_destroy();
    return header("Location: /index.php");
} else {
    echo "Error actualitzant registre" . mysqli_error($connexio);
}

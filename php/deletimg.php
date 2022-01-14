<?php

session_start();
$servidor = "localhost";
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
    

$imagen = $_SESSION['img'];

    if ($rol == "alumnat") {
        $archivo = "imatgedefecte.png";
        $viejo = $_SERVER['DOCUMENT_ROOT'] . "/recursos/img/imatgesperfil/alumnat/" . $imagen;
        unlink($viejo);
        $_SESSION['img'] = $archivo;

    } else {
        $archivo = "imatgedefecte.png";
        $viejo = $_SERVER['DOCUMENT_ROOT'] . "/recursos/img/imatgesperfil/professorat/" . $imagen;
        unlink($viejo);
        $_SESSION['img'] = $archivo;

    }


    $sql = "UPDATE $rol2 SET  imatgeperfil='$archivo'  WHERE $nombre1=$id ";

    if (mysqli_query($connexio, $sql)) {


        echo "Registre actualitzat correctament";
    
    } else {
        echo "Error actualitzant registre" . mysqli_error($connexio);
    }

    return header("Location: ./usuariRegistrat.php?parametre=mod");

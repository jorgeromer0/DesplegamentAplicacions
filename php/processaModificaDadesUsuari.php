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


$loggin =     $_SESSION['loggedin'];
$nom = $_POST['nom'];
$cognom = $_POST['cognom'];
$poblacio = $_POST['poblacio'];
$email = $_POST['email'];
// $rol = $_POST['rol'];

$sql = "UPDATE $rol2 SET nom='$nom', cognom='$cognom',  poblacio='$poblacio'   WHERE $nombre1=$id ";


// $sql = "UPDATE data SET Age='28' WHERE id=201";


//  $connexio->query($sql);

if (mysqli_query($connexio, $sql)) {


    echo "Registre actualitzat correctament";
    include  $_SERVER['DOCUMENT_ROOT'].'/php/escriuLogUsuari.php';



    registraAccio("Dades Usuari Modificades", $usuario, $rol2,  date('d-m-Y'),   date('H:i:s'));
} else {
    echo "Error actualitzant registre" . mysqli_error($connexio);
}


echo "error1111";

$host = $_SERVER['HTTP_HOST'];
// $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$html = 'usuariRegistrat.php';
$url = "http://$host/php/$html";
echo $url;

return header("Location: $url?parametre=mod");

// $row = $resultado->fetch_assoc();

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

// echo $row["contrasenya"];
$password = $_POST["passctual"];
$passwordnew = $_POST["passn"];
$passconf = $_POST["passconf"];
$cValid = password_verify($password, $row["contrasenya"]);

if ($cValid) {
    print "CONTRASENYA VALIDA";
    if ($passconf == $passwordnew) {

        $hashed_password = password_hash($passconf, PASSWORD_DEFAULT);

        // print($hashed_password);
        mysqli_query($connexio, "UPDATE $rol2 set contrasenya='$hashed_password' WHERE $nombre1=$id");
        include  $_SERVER['DOCUMENT_ROOT'].'/php/escriuLogUsuari.php';



        registraAccio("Contrasenya canviada", $usuario, $rol2,  date('d-m-Y'),   date('H:i:s'));
        // $host = $_SERVER['HTTP_HOST'];
        // // $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        // $html = 'usuariRegistrat.php';
        // $url = "http://$host/php/$html";
        // echo $url;

        return header("Location: usuariRegistrat.php?parametre=exitopass");
    } else {
        // $host = $_SERVER['HTTP_HOST'];
        // // $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        // $html = 'usuariRegistrat.php';
        // $url = "http://$host/php/$html";
        return header("Location: usuariRegistrat.php?parametre=modpass&error=confc");
    }
} else {
    // $host = $_SERVER['HTTP_HOST'];
    // // $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    // $html = 'usuariRegistrat.php';
    // $url = "http://$host/php/$html";
    return header("Location: usuariRegistrat.php?parametre=modpass&error=cactual");
}

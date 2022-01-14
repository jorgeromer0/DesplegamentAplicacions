<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

?>
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
$loggin =     $_SESSION['loggedin'];
$nom = $_POST['nom'];
$cognom = $_POST['cognom'];
$poblacio = $_POST['poblacio'];
$email = $_POST['email'];
// $rol = $_POST['rol'];


$fileSize = $_FILES['the_file']['size'];

// echo $fileSize;
// die();
if ($fileSize > 300000) {
    return header("Location: usuariRegistrat.php?url=modifica&parametre=errorimg");
} else {
    if ($rol == "alumnat") {
        $path = $_FILES['the_file']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $archivo = $email . "." . $ext;
        $rutaTemporal = $_FILES['the_file']['tmp_name'];
        $rutaEnServidor = $_SERVER['DOCUMENT_ROOT'] . "/recursos/img/imatgesperfil/alumnat/";
        
        
        // var_dump($archivo);
        // var_dump($rutaTemporal);
        // var_dump($rutaEnServidor);
        
    
        $rutaDestino = $rutaEnServidor  . $archivo;
// var_dump($rutaDestino);
    $ver =    move_uploaded_file($rutaTemporal, $rutaDestino);

        // var_dump($ver);
        // die();
        $viejo = $_SERVER['DOCUMENT_ROOT'] . "/recursos/img/imatgesperfil/alumnat/" . $imagen;
        unlink($viejo);
        $_SESSION['img'] = $archivo;
    } else {
        $path = $_FILES['the_file']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $archivo = $email . "." . $ext;
        $rutaTemporal = $_FILES['the_file']['tmp_name'];
        $rutaEnServidor = $_SERVER['DOCUMENT_ROOT'] . "/recursos/img/imatgesperfil/professorat/";

        $rutaDestino = $rutaEnServidor  . $archivo;
        move_uploaded_file($rutaTemporal, $rutaDestino);
        $viejo = $_SERVER['DOCUMENT_ROOT'] . "recursos/img/imatgesperfil/professorat/" . $imagen;
        unlink($viejo);
        $_SESSION['img'] = $archivo;
    }
}




$sql = "UPDATE $rol2 SET nom='$nom', cognom='$cognom',  poblacio='$poblacio' , imatgeperfil='$archivo'  WHERE $nombre1=$id ";


// $sql = "UPDATE data SET Age='28' WHERE id=201";


//  $connexio->query($sql);

if (mysqli_query($connexio, $sql)) {


    echo "Registre actualitzat correctament";
    include  $_SERVER['DOCUMENT_ROOT'] . '/php/escriuLogUsuari.php';



    registraAccio("Dades Usuari Modificades", $usuario, $rol2,  date('d-m-Y'),   date('H:i:s'));
} else {
    echo "Error actualitzant registre" . mysqli_error($connexio);
}


echo "error1111";

// $host = $_SERVER['HTTP_HOST'];
// // $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
// $html = 'usuariRegistrat.php';
// $url = "http://$host/php/$html";
// echo $url;

return header("Location: ./usuariRegistrat.php?parametre=mod");


// $row = $resultado->fetch_assoc();

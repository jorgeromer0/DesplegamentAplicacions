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

// Creem la connexio
$connexio = mysqli_connect($servidor, $usuari, $contrasenyabs, $base_dades);

// echo "hola";
$fileSize = $_FILES['the_file']['size'];

// echo $fileSize;
// echo "hola";

if ($fileSize > 5242880 || $fileSize == 0) {
    echo "dentro";

    return header("Location: usuariRegistrat.php?formulario=true&parametre=errorproj");
}


$titol = $_POST['element_1'];
$cicle = $_POST['cicle'];
$curs = $_POST['curs'];
$descripcio = $_POST['descripcio'];
$paraula = $_POST['paraula'];
$nomprofe = $_POST['nomprofe'];
$cognomprofe = $_POST['cognomprofe'];
$emailprofe = $_POST['emailprofe'];

$sql = "INSERT INTO projecte (titol,cicle,curs, descripcio,paraulesclau,data) VALUES ('$titol','$cicle','$curs' ,'$descripcio','$paraula',now())";

$insert = mysqli_query($connexio, $sql);

echo "<hr>";

if ($insert) {
    echo "DATOS INSERTADOS CORRECTAMENTE";
} else {
    echo "Error: " . mysqli_error($connexio)."es asi";
}

$sql = "select * from professorat where email = '$emailprofe'";
$result = mysqli_query($connexio, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1) {

    $idprof = $row['idprof'];

    echo $idprof;
} else {

    $contrasenya = "projectes";
    $hashed_password = password_hash($contrasenya, PASSWORD_DEFAULT);

    $sql = "INSERT INTO professorat (nom,cognom,email,poblacio,contrasenya,rol,data,imatgeperfil) VALUES ('$nomprofe','$cognomprofe','$emailprofe', 'Xàtiva','$hashed_password','PROFESSOR',now(),'imatgedefecte.png')";


    $insert = mysqli_query($connexio, $sql);


    if ($insert) {
        echo "DATOS PROFESSORAT INSERTADOS CORRECTAMENTE";

        $sql = "select * from professorat where email = '$emailprofe'";
        $result = mysqli_query($connexio, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        $idprof = $row['idprof'];

        echo "ID NUEVO PROFE " . $idprof;
    } else {
        echo "Error: " . mysqli_error($connexio);
    }
}


$emailalumnat  = $_SESSION['usuario'];
$sql = "select * from alumnat where email = '$emailalumnat'";
$result = mysqli_query($connexio, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
$idalum = $row['idalum'];
$nomalum = $row['nom'];
$cognomalum = $row['cognom'];

echo " ID  ALUM  " . $idalum;


$sql = "select * from projecte where titol = '$titol'";
$result = mysqli_query($connexio, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
$idprojecte = $row['idproj'];

echo "eii".$idprojecte."hola";
$sql = "INSERT INTO relacioprojecte  (idprof,idalum, idproj, idcrus,data) VALUES ('$idprof','$idalum','$idprojecte' ,'$curs',now())";

$insert = mysqli_query($connexio, $sql);

echo "<hr>";

if ($insert) {
    echo "\n DATOS INSERTADOS CORRECTAMENTE RELACIO PROJECTE";
} else {
    echo "Error: " . mysqli_error($connexio)."ES ESTE";
}

$sql = "select * from curs where idcurs = '$curs'";
$result = mysqli_query($connexio, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
$nomcurs = $row['curs'];


$porciones = explode("/", $nomcurs);
// echo ; 
// echo ;

$archivo = $idprojecte . "_" .$cicle."_"."$porciones[0]$porciones[1]"."_".$nomalum."_".$cognomalum.".pdf";
$rutaTemporal = $_FILES['the_file']['tmp_name'];
$rutaEnServidor = "../recursos/projectes/$cicle/$nomcurs/";

if (!file_exists($rutaEnServidor)) {
    mkdir($rutaEnServidor, 0777, true);
    $rutaDestino = $rutaEnServidor  . $archivo;
    move_uploaded_file($rutaTemporal, $rutaDestino);
}else{
    $rutaDestino = $rutaEnServidor  . $archivo;
    move_uploaded_file($rutaTemporal, $rutaDestino);
}

 return header("Location: usuariRegistrat.php");
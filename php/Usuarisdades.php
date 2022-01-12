<?php
$servidor = "192.168.1.52";
$usuari = "projectes_jorge";
$contrasenyabs = "projectes_jorge";
$base_dades = "projectes_jorge";

include("../entity/dadesFormulari.php");
$dades = new DadesFormulari($nom , $cognom, $poblacio ,$email,$contrasenya,$tipus);
$_SESSION['dadesformulari']= serialize($dades);
$dadessesio =  unserialize($_SESSION['dadesformulari']);

$_SESSION['nomguarda'] = $dadessesio->getNom();
$_SESSION['cognomguarda'] = $dadessesio->getCognom();
$_SESSION['poblacioguarda'] = $dadessesio->getPoblacio();
$_SESSION['emailguarda'] = $dadessesio->getEmail();
$_SESSION['contrasenyaguarda'] = $dadessesio->getContrasenya();




// $array = (array) $dades;

// echo $dades;
// var_dump($array);



// Creem la connexio
$connexio = mysqli_connect($servidor, $usuari, $contrasenyabs, $base_dades);


if (mysqli_connect_errno()) {
    echo "La conexion  a la base de datos  MYSQL ha fallado." . mysqli_connect_errno();
} else {
    echo "La conexion realizada correctamente!";
}

// $avalidar = "SELECT * from alumnat WHERE email='$email'";
// $resultado1 = $connexio->query($avalidar);
// // $contador1 = mysqli_num_rows($resultado1);

// $pvalidar = "SELECT * FROM professor WHERE email = '$email'";
// $resultado2 = $connexio->query($pvalidar);
// // $contador2 = mysqli_num_rows($resultado2);


if ($contrasenya != $contrasenya2) {
    // $host = $_SERVER['HTTP_HOST'];
    // // $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    // $html = 'registreUsuariNou.php';
    // $url = "http://$host/wwwjorge/php/$html";
    // echo $url;

    return header("Location: registreUsuariNou.php?parametre=error");
}



// $file = $_FILES['the_file'];
//Obtenemos tamaño imagen.
// $tamano_img = $file["the_file"];
//Imprimimos tamaño. 
$fileSize = $_FILES['the_file']['size'];

// echo "Tamaño imagen: $fileSize";
if (!file_exists($_FILES['the_file']['tmp_name'])) {
    $archivo = "imatgedefecte.png";
} else     if ($fileSize > 300000) {
    return header("Location: registreUsuariNou.php?parametre=errorimg");
} else {
    if ($tipus == "Alumnat") {
        $path = $_FILES['the_file']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $archivo = $email . "." . $ext;
        $rutaTemporal = $_FILES['the_file']['tmp_name'];
        $rutaEnServidor = $_SERVER['DOCUMENT_ROOT'] . "/recursos/img/imatgesperfil/alumnat/";

        $rutaDestino = $rutaEnServidor  . $archivo;
        move_uploaded_file($rutaTemporal, $rutaDestino);
    
    } else {
        $path = $_FILES['the_file']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $archivo = $email . "." . $ext;
        $rutaTemporal = $_FILES['the_file']['tmp_name'];
        $rutaEnServidor = $_SERVER['DOCUMENT_ROOT'] . "/recursos/img/imatgesperfil/professorat/";

        $rutaDestino = $rutaEnServidor  . $archivo;
        move_uploaded_file($rutaTemporal, $rutaDestino);
    }
}





$hashed_password = password_hash($contrasenya, PASSWORD_DEFAULT);

if ($tipus == "Alumnat") {



    $buscarCorreu   = "SELECT * from alumnat WHERE email='$email'";

    $resultat1 = mysqli_query($connexio, $buscarCorreu);


    // $contador1 = mysqli_num_rows($resultat1);

    if (mysqli_num_rows($resultat1) > 0) {
        // $host = $_SERVER['HTTP_HOST'];
        // // $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        // $html = 'registreUsuariNou.php';
        // $url = "http://$host/php/$html";
        // echo $url;
        // header("Location:  $url?error=alumne");

        header("Location: registreUsuariNou.php?error=alumne");
    } else {
        $sql = "INSERT INTO alumnat (nom,cognom,email,poblacio, contrasenya,rol,data,imatgeperfil) VALUES ('$nom','$cognom','$email' ,'$poblacio','$hashed_password','ALUMNAT',now(),'$archivo')";
        include  $_SERVER['DOCUMENT_ROOT'] . '/php/escriuLogUsuari.php';


        registraAccio("Nou Usuari", $email, "ALUMNAT",  date('d-m-Y'),   date('H:i:s'));
    }
} else {



    $buscarCorreu   = "SELECT * from professorat WHERE email='$email'";

    $resultat1 = mysqli_query($connexio, $buscarCorreu);


    // $contador1 = mysqli_num_rows($resultat1);

    if (mysqli_num_rows($resultat1) > 0) {
        // $host = $_SERVER['HTTP_HOST'];
        // // $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        // $html = 'registreUsuariNou.php';
        // $url = "http://$host/php/$html";
        // echo $url;
        header("Location: registreUsuariNou.php?error=professorat");
    } else {
        $sql = "INSERT INTO professorat (nom,cognom,email,poblacio,contrasenya,rol,data,imatgeperfil) VALUES ('$nom','$cognom','$email', '$poblacio','$hashed_password','PROFESSOR',now(),'$archivo')";

        include  $_SERVER['DOCUMENT_ROOT'] . 'php/escriuLogUsuari.php';

        registraAccio("Nou Usuari", $email, "PROFESSORAT",  date('d-m-Y'),   date('H:i:s'));
    }
}

$insert = mysqli_query($connexio, $sql);

echo "<hr>";

if ($insert) {
    echo "DATOS INSERTADOS CORRECTAMENTE";
} else {
    echo "Error: " . mysqli_error($connexio);
}

mysqli_close($connexio);

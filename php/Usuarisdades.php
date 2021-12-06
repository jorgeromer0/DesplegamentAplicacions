<?php
$servidor = "192.168.1.49";
$usuari = "projectes_jorge";
$contrasenyabs = "projectes_jorge";
$base_dades = "projectes_jorge";



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
    return header("Location: registreUsuariNou.php?parametre=error");
}




$hashed_password = password_hash($contrasenya, PASSWORD_DEFAULT);

if ($tipus == "Alumnat") {



    $buscarCorreu   = "SELECT * from alumnat WHERE email='$email'";

    $resultat1 = mysqli_query($connexio, $buscarCorreu);


    // $contador1 = mysqli_num_rows($resultat1);

    if (mysqli_num_rows($resultat1) > 0) {

        header("Location: registreUsuariNou.php?error=alumne");
    } else {
        $sql = "INSERT INTO alumnat (nom,cognom,email,poblacio, contrasenya,rol,data) VALUES ('$nom','$cognom','$email' ,'$poblacio','$hashed_password','ALUMNAT',now())";
    }
} else {



    $buscarCorreu   = "SELECT * from professorat WHERE email='$email'";

    $resultat1 = mysqli_query($connexio, $buscarCorreu);


    // $contador1 = mysqli_num_rows($resultat1);

    if (mysqli_num_rows($resultat1) > 0) {

        header("Location: registreUsuariNou.php?error=professorat");
    } else {
        $sql = "INSERT INTO professorat (nom,cognom,email,poblacio,contrasenya,rol,data) VALUES ('$nom','$cognom','$email', '$poblacio','$hashed_password','PROFESSOR',now())";
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

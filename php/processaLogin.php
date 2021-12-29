<?php

session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$tipus = $_POST['tipus'];

$servidor = "192.168.1.41";
$usuari = "projectes_jorge";
$contrasenyabs = "projectes_jorge";
$base_dades = "projectes_jorge";


echo $tipus;
// Creem la connexio
$connexio = mysqli_connect($servidor, $usuari, $contrasenyabs, $base_dades);
// if (mysqli_connect_errno()) {
//     echo "La conexion  a la base de datos  MYSQL ha fallado." . mysqli_connect_errno();
// } else {
//     echo "La conexion realizada correctamente!";
// }

switch ($tipus) {
    case 'alumnat':
        // print "alumnat a entrado";

        $sql = "select * from alumnat where email = '$email'";
        $result = mysqli_query($connexio, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $hash = "SELECT  contrasenya FROM alumnat WHERE email='$email'";
            $consulta_hash = mysqli_query($connexio, $hash);
            $row2 = mysqli_fetch_array($consulta_hash, MYSQLI_ASSOC);
            $usuariValid = password_verify($password, $row2['contrasenya']);

            if ($usuariValid) {
                print "CONTRASENYA VALIDA";
                $_SESSION['loggedin'] = true;
                $_SESSION['usuario'] = $email;
                $_SESSION['rol'] = $tipus;

                $host = $_SERVER['HTTP_HOST'];
                $html = 'usuariRegistrat.php';
                $url = "http://$host/php/$html";
                echo $url;
                include  $_SERVER['DOCUMENT_ROOT'].'/php/escriuLogUsuari.php';


                registraAccio("Login", $_SESSION['usuario'], $_SESSION['rol'],  date('d-m-Y'),   date('H:i:s'));
                return header("Location:  $url");
            } else {
                $host = $_SERVER['HTTP_HOST'];
                $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                $html = 'loginUsuari.php';
                $url = "http://$host/php/$html";
                echo $url;


                return header("Location:  $url?parametre=errorc");
            }
        } else {
            echo "<h1> Correo no valido";
            $host = $_SERVER['HTTP_HOST'];
            // $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $html = 'loginUsuari.php';
            $url = "http://$host/php/$html";
            echo $url;

            return header("Location:  $url?parametre=erroremail");
        }


        break;
    case 'professorat':
        print "professorat a entrado";
        $sql = "select * from professorat where email = '$email'";
        $result = mysqli_query($connexio, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $hash = "SELECT  contrasenya FROM professorat WHERE email='$email'";
            $consulta_hash = mysqli_query($connexio, $hash);
            $row2 = mysqli_fetch_array($consulta_hash, MYSQLI_ASSOC);
            $usuariValid = password_verify($password, $row2['contrasenya']);

            if ($usuariValid) {
                print "CONTRASENYA VALIDA";
                $_SESSION['loggedin'] = true;
                $_SESSION['usuario'] = $email;
                $_SESSION['rol'] = $tipus;

                $host = $_SERVER['HTTP_HOST'];
                $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                $html = 'usuariRegistrat.php';
                $url = "http://$host/php/$html";
                echo $url;
                include  $_SERVER['DOCUMENT_ROOT'].'/php/escriuLogUsuari.php';



                registraAccio("Login", $_SESSION['usuario'], $_SESSION['rol'],  date('d-m-Y'),   date('H:i:s'));

                return    header("Location: $url");
            } else {
                $host = $_SERVER['HTTP_HOST'];
                $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                $html = 'loginUsuari.php';
                $url = "http://$host/php/$html";
                echo $url;


                return header("Location:  $url?parametre=errorc");
            }
        } else {

            $host = $_SERVER['HTTP_HOST'];
            // $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $html = 'loginUsuari.php';
            $url = "http://$host/php/$html";
            echo $url;

            return header("Location:  $url?parametre=erroremail");
        }
}
// $sql = mysqli_query($connexio, "SELECT * FROM $tipus WHERE email = '$email' AND contrasenya = '$password'");



// $count = mysqli_num_rows($sql);

// echo $count;
// if ($sql) {

//     echo "DATOS INSERTADOS CORRECTAMENTE";
// } else {
//     echo "Error: " . mysqli_error($connexio);
// }

// if ($count == 1) {
//     $_SESSION['usuario'] = $email;
//     $_SESSION['rol'] = $tipus;
//     header('Location: usuariRegistrat.php');
// } else {
//     print("ERRROR!!!");
// }

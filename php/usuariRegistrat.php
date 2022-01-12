<?php

session_start();

$servidor = "192.168.1.52";
$usuari = "projectes_jorge";
$contrasenyabs = "projectes_jorge";
$base_dades = "projectes_jorge";
$usuario =     $_SESSION['usuario'];
$rol = $_SESSION['rol'];
$imagen = filemtime($_SESSION['img']);
$loggin =     $_SESSION['loggedin'];

$connexio = mysqli_connect($servidor, $usuari, $contrasenyabs, $base_dades);
$sql = "SELECT * FROM $rol WHERE  email ='$usuario'";
$resultado = $connexio->query($sql);
$row = $resultado->fetch_assoc();

if ($rol = $_SESSION['rol'] == "alumnat") {
    $id = $row['idalum'];
} else {
    $id = $row['idprof'];
}


?>



<?php require "../php/partials/cap.partial.php" ?>

<body>


    <div id="wrapper">
        <header id="cap">
            <h1>Projecte PHP <?php echo $row['nom']; ?></h1>
        </header>

        <nav class="navbar navbar-expand-sm bg-info navbar-dark justify-content-md-center justify-content-start">
            <a class="navbar-brand d-md-none d-inline" href="">Brand</a>
            <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="nav-link" href="#_"><i class="fa fa-search mr-1"></i></a>
            <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
                <ul class="navbar-nav mx-auto text-md-center text-left">
                    <li class="nav-item ">
                        <a class="nav-link" href="../index.php">Inici</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./visitant.php">Visitant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./loginUsuari.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./registreUsuariNou.php">Registra 't</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://<?php echo $_SERVER['SERVER_NAME'] ?>:5000/admin.php">Administracio</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav flex-row justify-content-md-center justify-content-start flex-nowrap">
                    <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-facebook mr-1"></i></a> </li>
                    <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-twitter"></i></a> </li>
                </ul>
            </div>
        </nav>

        <?php
        include "../php/partials/benvinguda.partial.php";

        if (isset($_GET['parametre']) && $_GET['parametre'] == "mod") {
            print ' <div class="alert alert-success mx-auto text-md-center text-left" role="alert"> Les teues dades s\'han canviat correctament.    </div>';
        }

        if (isset($_GET['parametre']) && $_GET['parametre'] == "exitopass") {
            print ' <div class="alert alert-success mx-auto text-md-center text-left" role="alert"> La contrasenya s\'ha canviat correctament.    </div>';
        }

        if (isset($_GET['parametre']) && $_GET['parametre'] == "modpass") {
            return include "../php/partials/canviContrasenya.partial.php";
        }

        if (isset($_GET["url"]) && $_GET["url"] == "modifica") {
            include "../php/partials/modificaDadesUsuari.partial.php";
        } else {
            include "../php/partials/dadesUsuari.partial.php";
        }



        if (isset($_GET['visualitza']) && $_GET['visualitza'] == "true") {
            // include "../php/partials/dadesUsuari.partial.php";
            include "../php/partials/visualitzaLog.partial.php";

        }



        ?>
        <?php include "../php/partials/peu.partial.php" ?>

<?php

if (basename($_SERVER['PHP_SELF']) == 'index.php') {
    $url = "./php/desconnecta.php";
} else {
    $url = $_SERVER['PHP_SELF'];
    $data = explode("php", $url);
    $index = $data[0];
    $url = "./desconnecta.php";
}

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    print ' <div class="alert alert-primary mx-auto text-md-center text-left" role="alert"> Hola ' . $_SESSION['usuario'] . ', estas registrat com a ' .     $_SESSION['rol'] . ' <a href=' . $url . '>Desconnecta\'t </a>    </div>';
}


?>
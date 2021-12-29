<?php

// if (isset($_GET['url']) && $_GET['url'] == "vlog") {
//     // include "../php/partials/dadesUsuari.partial.php";
//     include "../php/partials/visualitzaLog.partial.php";

// }else {
//     # code...
// }

echo "<main id='contingut'>";
echo "<h4 class='text-center'>Log  {$_SESSION['usuario']} </h4>";
$patron = "/" . $_SESSION['usuario'] . "/";
$ficher = fopen("../recursos/log/usuaris.log", "r");
while (!feof($ficher)) {
    $linea = fgets($ficher);
    if (preg_match($patron, $linea)) {
        echo $linea . "<br>";
    }
}
fclose($ficher);
?>

</main>
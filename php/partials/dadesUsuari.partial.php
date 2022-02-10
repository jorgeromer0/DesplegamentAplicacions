<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

?>

<main id="contingut">
    <h3>Usuari Registrat </h3>

    <p>Nom: <?php echo $row['nom']; ?> </p>
    <p>Cognom: <?php echo $row['cognom']; ?></p>
    <p>Poblacio: <?php echo $row['poblacio']; ?></p>
    <p> Email: <?php echo $row['email']; ?></p>
    <p> Contrasenya 1 : <?php echo $row['contrasenya']; ?></p>
    <p> Rol : <?php echo $row['rol']; ?></p>
    <p> Data : <?php echo $row['data']; ?></p>

    <br>


    <!-- <div>
                <a href="../index.php" class="btn btn-danger" role="button">Volver atras</a>
            </div> -->

</main>
<div class='alert alert-primary mx-auto text-md-center text-left' role="alert">
    <a href='../php/usuariRegistrat.php?url=modifica '>Modifica les teues dades </a>
    <br />
    <a href='../php/processaBaixaUsuari.php ' onclick='return confirm("Segur que vols donar-te de baixa ?");'> Dona't de baixa </a> <br>
    <?php
    if (isset($_GET['visualitza']) && $_GET['visualitza'] == 'true') { ?>
        <a href='../php/usuariRegistrat.php?visualitza=false'> Ocultar </a>

    <?php
    } else { ?>
        <a href='../php/usuariRegistrat.php?visualitza=true'> Visualitzar log </a>
    <?php  }
    ?>
    <br />

    <a href='../php/usuariRegistrat.php?formulario=true '>Nou Projecte</a>


</div>

<?php
// session_start();

$servidor = "localhost";
$usuari = "projectes_jorge";
$contrasenyabs = "projectes_jorge";
$base_dades = "projectes_jorge";
$usuario =     $_SESSION['usuario'];
$rol = $_SESSION['rol'];
$imagen = $_SESSION['img'];
$loggin =     $_SESSION['loggedin'];


// echo $rol;

$connexio = mysqli_connect($servidor, $usuari, $contrasenyabs, $base_dades);



?>


<?php


echo $rol;
if ( $rol == "professorat") {
    $query = "
 SELECT rp.idproj, pj.titol, pj.cicle, c.curs, pj.descripcio, a.nom as nomalumne, a.cognom as cognomsalumne, p.nom, p.cognom from relacioprojecte rp      
INNER JOIN professorat p ON p.idprof = rp.idprof     
 INNER JOIN alumnat a ON a.idalum = rp.idalum    
  INNER JOIN curs c ON c.idcurs = rp.idcrus     
 INNER JOIN projecte pj ON pj.idproj = rp.idproj     
 WHERE p.email = '$usuario'
 ";
}else {


    $query = "
 SELECT rp.idproj, pj.titol, pj.cicle, c.curs, pj.descripcio, a.nom as nomalumne, a.cognom as cognomsalumne, p.nom, p.cognom from relacioprojecte rp      
INNER JOIN professorat p ON p.idprof = rp.idprof     
 INNER JOIN alumnat a ON a.idalum = rp.idalum    
  INNER JOIN curs c ON c.idcurs = rp.idcrus     
 INNER JOIN projecte pj ON pj.idproj = rp.idproj     
 WHERE a.email = '$usuario'
 ";
    
}


$resultado = mysqli_query($connexio, $query);

if ($resultado->num_rows > 0) {
    echo '<table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Titol </th>
                    <th scope="col">Cicle</th>
                    <th scope="col">Curs</th>
                    <th scope="col">Descripcio</th>
                    <th scope="col">Alumnat</th>
                    <th scope="col">Professor</th>
        
                </tr>
            </thead>
            <tbody>';

    while ($row = mysqli_fetch_object($resultado)) {
        echo "<tr>";
        echo "<td>" . $row->idproj . " </td>";
        echo "<td>" . $row->titol . "</td>";
        echo "<td>" . $row->cicle . "</td>";
        echo "<td>" . $row->curs . "</td>";
        echo "<td>" . $row->descripcio . "</td>";
        echo "<td>" . $row->nomalumne . ' ' . $row->cognomsalumne . "</td>";
        echo "<td>" . $row->nom . '' . $row->cognom . "</td>";


        echo "</tr>";
    }
} else {
    echo "<div class='alert alert-danger'>No tens projectes. </div>";
}



?>

</tbody>
</table>
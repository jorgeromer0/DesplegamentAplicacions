<?php include "../php/partials/cap.partial.php" ?>

<body>




    <div id="wrapper">
        <header id="cap">
            <h1>Inici Projecte PHP Jorge</h1>
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
        <?php include "../php/partials/benvinguda.partial.php" ?>

        <main id="contingut">
            <?php require "../php/partials/cerca.partial.php" ?>
            <?php
            // session_start();

            $servidor = "localhost";
            $usuari = "projectes_jorge";
            $contrasenyabs = "projectes_jorge";
            $base_dades = "projectes_jorge";
            // $usuario =     $_SESSION['usuario'];
            // $rol = $_SESSION['rol'];
            // $imagen = $_SESSION['img'];
            // $loggin =     $_SESSION['loggedin'];


            // echo $rol;

            $connexio = mysqli_connect($servidor, $usuari, $contrasenyabs, $base_dades);








            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $titol = $_POST["title"];

                $ciclo = $_POST["ciclo"];
                $curs = $_POST["curs"];
                $descripcio = $_POST["descripcio"];
                $nalumnat = $_POST["nalumnat"];
                $nprofesorat = $_POST["nprofesorat"];
                // echo "TITOL ".$titol;
                // echo "CICLO ".$ciclo;
                // echo "CURS ".$curs;
                // echo "N ALUM ".$nalumnat;
                // echo "N PROF ".$nprofesorat;

                $query = "
    SELECT rp.idproj, pj.titol, pj.cicle, c.curs, pj.descripcio,pj.paraulesclau, a.nom as nomalumne, a.cognom as cognomsalumne, p.nom, p.cognom from relacioprojecte rp      
    INNER JOIN professorat p ON p.idprof = rp.idprof     
    INNER JOIN alumnat a ON a.idalum = rp.idalum    
     INNER JOIN curs c ON c.idcurs = rp.idcrus     
    INNER JOIN projecte pj ON pj.idproj = rp.idproj     
    AND titol LIKE '%" . $titol . "%'
    AND cicle LIKE '%" . $ciclo . "%'
    AND idcurs LIKE '%" . $curs . "%'
    AND descripcio LIKE '%" . $descripcio . "%'
    AND a.nom LIKE '%" . $nalumnat . "%'
    AND p.nom LIKE '%" . $nprofesorat . "%'
    
    
    ";
            } else {
                echo "";

                $query = "
SELECT rp.idproj, pj.titol, pj.cicle, c.curs, pj.descripcio,pj.paraulesclau, a.nom as nomalumne, a.cognom as cognomsalumne, p.nom, p.cognom from relacioprojecte rp      
INNER JOIN professorat p ON p.idprof = rp.idprof     
INNER JOIN alumnat a ON a.idalum = rp.idalum    
 INNER JOIN curs c ON c.idcurs = rp.idcrus     
INNER JOIN projecte pj ON pj.idproj = rp.idproj     


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
                   <th scope="col">Paraules Clau</th>
                   <th scope="col">Alumnat</th>
                   <th scope="col">Professor</th>
                   <th scope="col">Fitxer</th>
       
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
                    echo "<td>" . $row->paraulesclau . "</td>";

                    echo "<td>" . $row->nomalumne . ' ' . $row->cognomsalumne . "</td>";
                    echo "<td>" . $row->nom . '' . $row->cognom . "</td>";
                    $porciones1 = explode("/", $row->curs);
                    // $porciones2 = explode(" ", );

                    $memoria_projecte = "" . $row->idproj . "_" . $row->cicle . "_" . $porciones1[0] . "" . $porciones1[1] . "_" . $row->nomalumne . "_" . $row->cognomsalumne . ".pdf";
                    $ruta = "../recursos/projectes/" . $row->cicle . "/" . $porciones1[0] . "/" . $porciones1[1] . "/" . $memoria_projecte;
                    echo "<td><a href='$ruta'>Fitxer</a></td>";

                    echo "</tr>";
                }
                echo "</table>";
            } else {

                echo "<p>No hi ha projecters per aquests criteris</p>\n";
                echo "<img src='../recursos/img/conejo.png'  width='100px' height='100px'>";
            }


            ?>



            <div>
                <a href="../index.php" class="btn btn-danger" role="button">Volver atras</a>
            </div>

        </main>
        <?php include "../php/partials/peu.partial.php" ?>
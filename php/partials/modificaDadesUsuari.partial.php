<main id="contingut">

    <h3>Modifica Dades Usuari </h3>

    <form action="processaModificaDadesUsuari.php" method="post" enctype="multipart/form-data">
        <p>Nom: <input type="text" name="nom" size="40" value=" <?php echo $row['nom']; ?>"></p>
        <p>Cognom: <input type="text" name="cognom" size="40" value=" <?php echo $row['cognom']; ?>"></p>
        <p>Poblacio: <input type="text" name="poblacio" size="40" value=" <?php echo $row['poblacio']; ?>"></p>
        <p>Email: <input type="text" name="email" size="40" value="<?php echo $row['email']; ?>" readonly></p>
        <p>Contrasenya <a href="../php/usuariRegistrat.php?parametre=modpass">Canvia la contrasenya</a></p>
        <p>Rol: <input type="text" name="rol" size="40" value="<?php echo $row['rol']; ?>" readonly></p>
        <p>Imatge de perfil (màx. 300KB) 
        <input type="file" name="the_file" accept="image/png, image/gif, image/jpeg" />
        </p>
        <?php

        $parametre = "";
        if (isset($_GET['parametre'])) {
            $parametre = $_GET['parametre'];
        }


        if ($parametre == "errorimg") {
            echo '    <span class="errorMsg" id="validation">La imatge és massa gran</span>';
        }


        ?>




        <p>
            <input type="submit" value="Enviar">
        </p>
    </form>
    <div class="bg-light">
        <p class="text-danger">Tria una nova imatge per canviar l'actual
            <?php

            $imagen =    $_SESSION['img'];
            // echo $_SESSION['rol'];
            // echo $imagen;
            if ($_SESSION['rol'] == "alumnat" && $imagen != "imatgedefecte.png") {
                echo "<img src='../recursos/img/imatgesperfil/alumnat/$imagen'  width='40'>";
            }

            if ($_SESSION['rol'] == "professorat" && $imagen != "imatgedefecte.png") {
                echo "<img src='../recursos/img/imatgesperfil/professorat/$imagen'  width='40'>";
            }

            if ($imagen == "imatgedefecte.png") {
                echo "<img src='../recursos/img/imatgesperfil/$imagen'  width='40'>";
            }

            ?>
            <a href="../php/deletimg.php">Elimina la imatge </a>
        </p>
    </div>
</main>
<div class='alert alert-primary mx-auto text-md-center text-left' role="alert"> <a href='../php/usuariRegistrat.php'>Cancel·la </a> </div>
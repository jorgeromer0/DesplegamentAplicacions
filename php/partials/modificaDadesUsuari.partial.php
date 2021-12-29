<main id="contingut">

    <h3>Modifica Dades Usuari </h3>

    <form action="processaModificaDadesUsuari.php" method="post">
        <p>Nom: <input type="text" name="nom" size="40" value=" <?php echo $row['nom']; ?>"></p>
        <p>Cognom: <input type="text" name="cognom" size="40" value=" <?php echo $row['cognom']; ?>"></p>
        <p>Poblacio: <input type="text" name="poblacio" size="40" value=" <?php echo $row['poblacio']; ?>"></p>
        <p>Email: <input type="text" name="email" size="40" value="<?php echo $row['email']; ?>" readonly></p>
        <p>Contrasenya <a href="../php/usuariRegistrat.php?parametre=modpass">Canvia la contrasenya</a></p>
        <p>Rol: <input type="text" name="rol" size="40" value="<?php echo $row['rol']; ?>" readonly></p>

        <p>
            <input type="submit" value="Enviar">
        </p>
    </form>

</main>
<div class='alert alert-primary mx-auto text-md-center text-left' role="alert"> <a href='../php/usuariRegistrat.php'>Cancel·la </a> </div>
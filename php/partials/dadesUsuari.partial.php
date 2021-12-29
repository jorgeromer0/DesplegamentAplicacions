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
        <a href='../php/usuariRegistrat.php?visualitza=true'> Visualitzar log  </a>
    <?php  }
    ?>

</div>
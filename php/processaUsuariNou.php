<?php

$nom = $_POST['nom'];
$cognom = $_POST['cognom'];
$poblacio =  $_POST['poblacio'];
$email = $_POST['email'];
$contrasenya = $_POST['contrasenya'];
$contrasenya2 = $_POST['contrasenya2'];
$tipus = $_POST['tipus'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/estils.css" rel="stylesheet" type="text/css">
</head>

<body>


    <div id="wrapper">
        <header id="cap">
            <h1>Inici Projecte PHP Jorge</h1>
        </header>
        <main id="contingut">
            <h3>PROCESSA REGISTRE USUARI NOU </h3>

            <p>Nom: <?= $nom ?></p>
            <p>Cognom: <?= $cognom ?></p>
            <p>Poblacio: <?= $poblacio ?></p>
            <p> Email: <?= $email ?></p>
            <p> Contrasenya 1 : <?= $contrasenya ?></p>
            <p> Contrasenya 2 : <?= $contrasenya2 ?></p>
            <p> Tipus : <?= $tipus ?></p>



            <br>
            <div>
                <a href="../index.php" class="btn btn-danger" role="button">Volver atras</a>
            </div>

        </main>
        <footer id="peu">
            <p>
                Jorge<br />
                Desplegament d’aplicacions web<br />
                Curs 2021/2022<br />

            </p>
        </footer>
    </div>
</body>

</html>
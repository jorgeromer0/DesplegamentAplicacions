<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/estils.css" rel="stylesheet" type="text/css">
</head>

<body>


    <div id="wrapper">
        <header id="cap">
            <h1>Inici Projecte PHP Jorge</h1>
        </header>
        <main>
            <a href="./php/visitant.php" role="button">
                <div id="container1">

                    <img src="img/visitor.png" class="img-1" alt="...">

                </div>
            </a>
            <div id="container2">
                <img src="img/usuario.png" class="img-1" alt="...">
                <div>

                    <a href="./php/loginUsuari.php" class="btn btn-success" role="button">Accedeix</a>
                    <a href="./php/registreUsuariNou.php" class="btn btn-success" role="button">Registrar</a>
                </div>
            </div>
            <a href="./php/admin.php" role="button">
                <div id="container3">
                    <img src="img/admin.png" class="img-1" alt="...">
                </div>
            </a>
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
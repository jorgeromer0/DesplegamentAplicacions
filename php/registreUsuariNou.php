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
            <h3>REGISTRE USUARI NOU </h3>
            <div class="container px-5 my-5">
                <form id="contactForm" action="processaUsuariNou.php" method="POST">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="nom" type="text" placeholder="Nom" name="nom" required />
                        <label for="nom">Nom</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="cognom" type="text" placeholder="Cognom" name="cognom" required />
                        <label for="cognom">Cognom</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="poblacio" type="text" placeholder="Poblacio" name="poblacio" required />
                        <label for="poblacio">Poblacio</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" placeholder="Email " name="email" required />
                        <label for="email">Email </label>

                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="contrasenya" type="password"" placeholder=" Contrasenya" name="contrasenya" minlength="6" required />
                        <label for="contrasenya">Contrasenya</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="confirmaCotrasena" type="password" placeholder="Confirma contraseña" name="contrasenya2" minlength="6" required />
                        <label for="confirmaCotrasena">Confirma contraseña</label>
                    </div>
                    <?php

                    $parametre = "";
                    if (isset($_GET['parametre'])) {
                        $parametre = $_GET['parametre'];
                    }


                    if ($parametre == "error") {
                        echo '    <span class="errorMsg" id="validation">Les contrasenyes han de coincidir</span>';
                    }


                    ?>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="newField8" aria-label="New Field 8" name="tipus">
                            <option value="Alumnat">Alumnat</option>
                            <option value="Professorat">Professorat</option>
                        </select>
                        <label for="newField8">Tipus d'usuari</label>
                    </div>

            </div>
            <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">Error sending message!</div>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg " id="submitButton" type="submit">Submit</button>
            </div>
            </form>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <br>
    <div>
        <a href="../index.php" class="btn btn-danger" role="button">Volver atras</a>
    </div>
    <?php


    ?>
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
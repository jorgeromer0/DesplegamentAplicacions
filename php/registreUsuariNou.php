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
                    <?php

                    $error = "";
                    if (isset($_GET['error'])) {
                        $error = $_GET['error'];
                    }


                    if ($error == "alumne") {
                        echo '    <span class="errorMsg" id="validation">El alumnat ja existeix </span>';
                    }
                    if ($error == "professorat") {
                        echo '    <span class="errorMsg" id="validation">El professorat ja existeix </span>';
                    }

                    ?>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="contrasenya" type="password"" placeholder=" Contrasenya" name="contrasenya1" minlength="6" required />
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

    <br>
    <div>
        <a href="../index.php" class="btn btn-danger" role="button">Volver atras</a>
    </div>
    <?php


    ?>
    </main>
    
    <?php include "../php/partials/peu.partial.php" ?>
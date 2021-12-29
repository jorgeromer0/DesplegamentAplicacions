<?php include "../php/partials/cap.partial.php" ?>

<body>
    <?php
    session_start();


    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $host = $_SERVER['HTTP_HOST'];
        // $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $html = 'usuariRegistrat.php';
        $url = "http://$host/php/$html";
        echo $url;

        return header("Location: $url");
    }


    ?>

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

        <main id="contingut">
            <h3>LOGIN USUARI REGISTRAT </h3>
            <form id="contactForm" action="processaLogin.php" method="POST">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
                    </div>
                </div>

                <?php

                $parametre = "";
                if (isset($_GET['parametre'])) {
                    $parametre = $_GET['parametre'];
                }


                if ($parametre == "erroremail") {
                    echo '    <span class="errorMsg" id="validation">L \'usuari no existeix.</span>';
                }


                ?>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Contrasenya</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
                    </div>
                </div>

                <?php

                $parametre = "";
                if (isset($_GET['parametre'])) {
                    $parametre = $_GET['parametre'];
                }


                if ($parametre == "errorc") {
                    echo '    <span class="errorMsg" id="validation">La contraseña és incorrecta.</span>';
                }


                ?>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Tipus d'usuari</legend>
                        <div class="col-sm-10">


                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="tipus">

                                <option value="professorat">Professorat</option>
                                <option value="alumnat">Alumnat</option>

                            </select>


                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </div>
            </form>

        </main>
        <?php include "../php/partials/peu.partial.php" ?>
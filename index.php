<?php include "./php/partials/cap.partial.php" ?>

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
                        <a class="nav-link" href="index.php">Inici</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./php/visitant.php">Visitant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./php/loginUsuari.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./php/registreUsuariNou.php">Registra 't</a>
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
        <?php include "./php/partials/benvinguda.partial.php" ?>

        <main>
            <a href="./php/visitant.php" role="button">
                <div id="container1">

                    <img src="./recursos/img/visitor.png" class="img-1" alt="...">

                </div>
            </a>
            <div id="container2">
                <img src="./recursos/img/usuario.png" class="img-1" alt="...">
                <div>

                    <a href="./php/loginUsuari.php" class="btn btn-success" role="button">Accedeix</a>
                    <a href="./php/registreUsuariNou.php" class="btn btn-success" role="button">Registrar</a>
                </div>
            </div>
            <a href="./php/admin.php" role="button">
                <div id="container3">
                    <img src="./recursos/img/admin.png" class="img-1" alt="...">
                </div>
            </a>
        </main>
        <?php include "./php/partials/peu.partial.php" ?>
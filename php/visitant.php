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
            <h3>VISITANT: EN CONSTRUCCIO </h3>
            <img src="../recursos/img/obras.gif" class="img-2" alt="...">
            <div>
                <a href="../index.php" class="btn btn-danger" role="button">Volver atras</a>
            </div>

        </main>
        <?php include "../php/partials/peu.partial.php" ?>
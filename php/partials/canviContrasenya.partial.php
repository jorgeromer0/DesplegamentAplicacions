<main id="contingut">
    <div class="card card-outline-secondary">
        <div class="card-header">
            <h3 class="mb-0">Canvi de contrasenya</h3>
        </div>
        <div class="card-body">
            <form class="form" action="processaCanviContrasenya.php" method="post">
                <div class="form-group">
                    <label for="inputPasswordOld">Contrasenya actual </label>
                    <input type="password" class="form-control" id="inputPasswordOld" name="passctual" required="">
                </div>

                <?php

                $parametre = "";
                if (isset($_GET['error'])) {
                    $parametre = $_GET['error'];
                    // print($parametre);
                }


                if ($parametre == "cactual") {
                    echo '    <span class="errorMsg" id="validation">La contraseña actual no és correcta.</span>';
                }


                ?>
                <div class="form-group">
                    <label for="inputPasswordNew">Nova contrasenya</label>
                    <input type="password" class="form-control" id="inputPasswordNew" name="passn" required="">

                </div>
                <?php

                $parametre = "";
                if (isset($_GET['error'])) {
                    $parametre = $_GET['error'];
                    // print($parametre);
                }


                if ($parametre == "confc") {
                    echo '    <span class="errorMsg" id="validation">La contraseña han de coincidir.</span>';
                }


                ?>

                <div class="form-group">
                    <label for="inputPasswordNewVerify">Confirma contrasenya</label>
                    <input type="password" class="form-control" id="inputPasswordNewVerify" name="passconf" required="">

                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg float-right">Envia</button>
                </div>
            </form>
        </div>
    </div>
</main>
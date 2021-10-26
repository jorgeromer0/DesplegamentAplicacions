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
                        <input class="form-control" id="nom" type="text" placeholder="Nom" data-sb-validations="required" name="nom" />
                        <label for="nom">Nom</label>
                        <div class="invalid-feedback" data-sb-feedback="nom:required">Nom is required.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="cognom" type="text" placeholder="Cognom" data-sb-validations="required" name="cognom" />
                        <label for="cognom">Cognom</label>
                        <div class="invalid-feedback" data-sb-feedback="cognom:required">Cognom is required.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="poblacio" type="text" placeholder="Poblacio" data-sb-validations="required" name="poblacio" />
                        <label for="poblacio">Poblacio</label>
                        <div class="invalid-feedback" data-sb-feedback="poblacio:required">Poblacio is required.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" placeholder="Email " data-sb-validations="required,email" name="email" />
                        <label for="email">Email </label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email Email is not valid.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="contrasenya" type="password"" placeholder=" Contrasenya" data-sb-validations="required" name="contrasenya" />
                        <label for="contrasenya">Contrasenya</label>
                        <div class="invalid-feedback" data-sb-feedback="contrasenya:required">Contrasenya is required.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="confirmaCotrasena" type="password" placeholder="Confirma contraseña" data-sb-validations="required" name="contrasenya2" />
                        <label for="confirmaCotrasena">Confirma contraseña</label>
                        <div class="invalid-feedback" data-sb-feedback="confirmaCotrasena:required">Confirma contraseña is required.</div>
                    </div>
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
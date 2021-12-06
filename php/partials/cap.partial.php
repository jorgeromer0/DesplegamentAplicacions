<?php
if (basename($_SERVER['PHP_SELF']) == 'index.php') {
    $css = "css/estils.css";
} else {
    $url = $_SERVER['PHP_SELF'];
    $data = explode("php", $url);
    $index = $data[0];
    $css = "../css/estils.css";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="<?php echo $css; ?>" rel="stylesheet" type="text/css">
</head>
<?php
session_start();

unset($_SESSION['loggedin']);
unset($_SESSION['usuario']);
unset($_SESSION['rol']);
session_destroy();


return header("Location: ../index.php");

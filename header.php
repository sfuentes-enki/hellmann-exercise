<?php 
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hellmann</title>
    <link rel="stylesheet" href="./style.css" type="text/css">
</head>
<body>
    <nav>
        <ul>
            <a href="index.php"><li>Inicio</li></a>
            <?php if(!isset($_SESSION['usersId'])) : ?>
                <a href="signup.php"><li>Registrarse</li></a>
                <a href="login.php"><li>Inicio de sesión</li></a>
            <?php else: ?>
                <a href="./controllers/Users.php?q=logout"><li>Salir</li></a>
            <?php endif; ?>
        </ul>
    </nav>
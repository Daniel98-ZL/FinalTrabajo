<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

// Obtener el email del usuario desde la sesión
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página Principal</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 50px;
        }

        p {
            color: #555;
            text-align: center;
        }

        img {
            display: block;
            margin: 50px auto;
            max-width: 400px;
            height: auto;
            border-radius: 10px;
        }

        a {
            display: block;
            text-align: center;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px auto;
            max-width: 200px;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Bienvenido, <?php echo $email; ?></h1>

    <p>Esta moto es una de mis metas</p>
    <img src="https://bd.gaadicdn.com/upload/userfiles/images/61768e2bb9faf.jpg" alt="Dominar 400 Sport Touring">
    <a href="https://www.youtube.com/watch?v=zE5piEHmNjg&t=1s"> Te invito a ver las caracteristicas </a>
    <a href="index.php">Cerrar sesión</a>
</body>
</html>

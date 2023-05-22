<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Establecer la conexión con la base de datos
    $conexion = mysqli_connect('localhost', 'Daniel', 'admin', 'registro');

    if (!$conexion) {
        die('Error al conectar a la base de datos: ' . mysqli_connect_error());
    }

    // Consulta para verificar las credenciales en la tabla "registro"
    $query = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
    $resultado = mysqli_query($conexion, $query);

    if (!$resultado) {
        die('Error en la consulta: ' . mysqli_error($conexion));
    }

    // Verificar si se encontró un registro coincidente
    if (mysqli_num_rows($resultado) === 1) {
        // Iniciar sesión y redirigir al usuario a la página principal
        $_SESSION['email'] = $email;
        header('Location: principal.php');
        exit();
    } else {
        // Credenciales incorrectas, mostrar mensaje de error
        header('Location: error.php');
        exit();
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        
        h1 {
            color: #333;
            text-align: center;
        }
        
        form {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #555;
        }
        
        p {
            text-align: center;
            margin-top: 20px;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Iniciar Sesión</h1>

    <form method="POST" action="index.php">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Ingresar</button>
    </form>

    <p>No tienes una cuenta? <a href="registrarse.php">Regístrate</a></p>
</body>
</html>


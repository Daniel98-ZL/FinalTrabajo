<!DOCTYPE html>
<html>
<head>
    <title>Registro de usuario</title>
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
        
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Registro de usuario</h1>
    
    <?php
// Comprueba si el formulario de registro ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $nombre = $_POST["nombre"];
    $dni = $_POST["dni"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Establece la conexión con la base de datos
    $servername = "localhost";
    $username = "Daniel";
    $password_db = "admin";
    $dbname = "registro";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Verifica si hay errores en la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Prepara la consulta SQL para insertar los datos en la tabla correspondiente
    $sql = "INSERT INTO usuarios (nombre, dni, email, password) VALUES ('$nombre', '$dni', '$email', '$password')";

    // Ejecuta la consulta
    if ($conn->query($sql) === TRUE) {
        echo "<p>¡Registro exitoso!</p>";
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }

    // Cierra la conexión con la base de datos
    $conn->close();
}
?>

    
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Registrarse"><a href="index.php"> Volver al Inicio </a>
    </form>
</body>
</html>

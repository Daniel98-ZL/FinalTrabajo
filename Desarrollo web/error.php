<!-- error.php -->
<h1>Error de autenticación</h1>
<p>Las credenciales ingresadas no son correctas. Por favor, verifica tus datos e intenta nuevamente.</p>
<!-- index.php -->
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
        
        #errorContainer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Manejar el envío del formulario de inicio de sesión mediante AJAX
            $('#loginForm').submit(function(event) {
                event.preventDefault(); // Evitar el envío del formulario

                // Obtener los datos del formulario
                var email = $('#email').val();
                var password = $('#password').val();

                // Realizar la petición AJAX
                $.ajax({
                    type: 'POST',
                    url: 'index.php',
                    data: { email: email, password: password },
                    success: function(response) {
                        if (response === 'success') {
                            // Redireccionar a la página principal
                            window.location.href = 'principal.php';
                        } else {
                            // Mostrar la página de error en la página index.php
                            $('#errorContainer').load('error.php');
                        }
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h1>Iniciar Sesión</h1>

    <form id="loginForm" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Iniciar Sesión <a href="principal.php"></a> </button>
    </form>

    <div id="errorContainer"></div>
    <a href="index.php">Ir al inicio</a>
</body>
</html>

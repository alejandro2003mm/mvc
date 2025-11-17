<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #F1F5F9; /* gris claro estilo tailwind */
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px 30px;
        }

        /* HEADER */
        .header {
            text-align: center;
            background: #4C1D95; /* Morado */
            color: white;
            padding: 18px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        /* NAV */
        .nav {
            background: #1E3A8A; 
            padding: 12px;
            display: flex;
            justify-content: center;
            gap: 12px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .nav a {
            color: white;
            text-decoration: none;
            padding: 10px 16px;
            background: #3B82F6; 
            border-radius: 6px;
            font-weight: bold;
            transition: .3s;
        }

        .nav a:hover {
            background: #60A5FA;
        }

        /* MENSAJES */
        .alert-success {
            background: #DCFCE7;
            border-left: 6px solid #16A34A;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .alert-error {
            background: #FFE4E6;
            border-left: 6px solid #F43F5E;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        /* INFO BOX */
        .info-box {
            background: #E0F2FE;
            border-left: 6px solid #0284C7;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        /* FORMULARIO */
        .form-container {
            background: #FEF9C3;
            border-left: 6px solid #EAB308;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .form-container h2 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #CBD5E1;
            border-radius: 6px;
            font-size: 16px;
        }

        .form-group textarea {
            resize: vertical;
            height: 120px;
        }

        .btn {
            background: #2563EB;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            font-size: 17px;
            transition: .3s;
            font-weight: bold;
        }

        .btn:hover {
            background: #1D4ED8;
        }

        /* FOOTER */
        .footer {
            background: #0F172A;
            color: white;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
        }

    </style>
</head>
<body>

<div class="container">

    <!-- HEADER -->
    <div class="header">
        <h1><?php echo htmlspecialchars($pageTitle); ?></h1>
    </div>

    <!-- NAV -->
    <nav class="nav">
        <a href="<?php echo BASE_URL; ?>">🏠 Inicio</a>
        <a href="<?php echo BASE_URL; ?>/home/about">ℹ️ Acerca de</a>
        <a href="<?php echo BASE_URL; ?>/home/mvc_info">📚 ¿Qué es MVC?</a>
        <a href="<?php echo BASE_URL; ?>/home/contact">📧 Contacto</a>
        <a href="<?php echo BASE_URL; ?>/home/personal">👤 Sobre mí</a>
    </nav>

    <!-- MENSAJE -->
    <?php if (!empty($message)): ?>
        <div class="alert-<?php echo $messageType; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <!-- INFO -->
    <div class="info-box">
        <h3>📝 Ejemplo de manejo de formularios en MVC</h3>
        <p>Este formulario demuestra cómo el patrón MVC maneja los datos:</p>
        <ol>
            <li><strong>Vista:</strong> Muestra el formulario HTML</li>
            <li><strong>Controlador:</strong> Procesa los datos enviados</li>
            <li><strong>Modelo:</strong> Guardaría los datos (en un caso real)</li>
            <li><strong>Vista:</strong> Muestra mensajes o resultados</li>
        </ol>
    </div>

    <!-- FORMULARIO -->
    <div class="form-container">
        <h2>📧 Envíanos un mensaje</h2>
        <p>Completa el formulario y observa cómo MVC procesa tus datos:</p>

        <form method="POST" action="<?php echo BASE_URL; ?>/home/contact">
            <div class="form-group">
                <label for="name">👤 Nombre completo:</label>
                <input type="text" 
                       id="name" 
                       name="name"
                       value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"
                       required
                       placeholder="Escribe tu nombre completo">
            </div>

            <div class="form-group">
                <label for="email">📧 Correo electrónico:</label>
                <input type="email" 
                       id="email" 
                       name="email"
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                       required
                       placeholder="tu@email.com">
            </div>

            <div class="form-group">
                <label for="message">💬 Mensaje:</label>
                <textarea id="message" 
                          name="message"
                          required
                          placeholder="Escribe tu mensaje aquí..."><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
            </div>

            <button type="submit" class="btn">📤 Enviar Mensaje</button>
        </form>
    </div>

    <!-- EXPLICACIÓN TÉCNICA -->
    <div class="info-box">
        <h3>🔧 ¿Qué hace el controlador al procesar el formulario?</h3>
        <ol>
            <li>Verifica si es una petición POST</li>
            <li>Obtiene los datos enviados</li>
            <li>Valida campos vacíos</li>
            <li>Valida email con <code>filter_var()</code></li>
            <li>Muestra mensaje de éxito o error</li>
        </ol>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <p>&copy; 2025 - Framework MVC Educativo</p>
        <p>Ejemplo de manejo de formularios con MVC 📝</p>
    </div>

</div>

</body>
</html>

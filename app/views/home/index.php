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
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px 30px;
        }

        /* ===== HEADER ===== */
        .header {
            text-align: center;
            background: #4C1D95; /* MORADO */
            color: white;
            padding: 18px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        /* ===== NAV ===== */
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

        /* ===== SECCIÓN 1: WELCOME ===== */
        .welcome-box {
            background: #DCFCE7; 
            border-left: 6px solid #16A34A; 
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        /* ===== SECCIÓN 2: INFO UNIVERSIDAD ===== */
        .info-box.uni {
            background: #FFE4E6; /* ROSA SUAVE */
            border-left: 6px solid #F43F5E;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        /* ===== SECCIÓN 3: HOBBIES ===== */
        .users-section {
            background: #FEF9C3; /* AMARILLO SUAVE */
            border-left: 6px solid #EAB308;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .user-card {
            background: white;
            border-left: 4px solid #2563EB;
            padding: 15px;
            margin: 12px 0;
            border-radius: 6px;
            transition: .3s;
        }

        .user-card:hover {
            background: #EFF6FF;
            transform: translateX(6px);
        }

        /* ===== SECCIÓN 4: EXTRA INFO ===== */
        .info-box.extra {
            background: #E0F2FE; /* AZUL MUY SUAVE */
            border-left: 6px solid #0284C7;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: #0F172A; /* GRIS OSCURO */
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
            <p>Fecha y hora actual: <?php echo htmlspecialchars($currentDate); ?></p>
        </div>

        <!-- NAVEGACIÓN -->
        <div class="nav">
            <a href="<?php echo BASE_URL; ?>">🏠 Inicio</a>
            <a href="<?php echo BASE_URL; ?>/home/about">ℹ️ Acerca de</a>
            <a href="<?php echo BASE_URL; ?>/home/mvc_info">📚 ¿Qué es MVC?</a>
            <a href="<?php echo BASE_URL; ?>/home/contact">📧 Contacto</a>
            <a href="<?php echo BASE_URL; ?>/home/personal">👤 Sobre mí</a>
        </div>

        <!-- MENSAJE DE BIENVENIDA -->
        <div class="welcome-box">
            <h2>¡Bienvenido a tu primera aplicación MVC! 🎉</h2>
            <p><?php echo htmlspecialchars($welcomeMessage); ?></p>
            <p><?php echo htmlspecialchars($description); ?></p>
        </div>

        <!-- INFORMACIÓN SOBRE ESTA PÁGINA -->
        <div class="info-box uni">
            <h3>🔍 ¿Cómo funciona esta página?</h3>
            <ol>
                <li>
                    <strong>URL:</strong> Accediste a 
                    <code><?php echo BASE_URL; ?></code> 
                    (o <code>/home/index</code>)
                </li>

                <li><strong>Router (App.php):</strong> Analizó la URL y determinó que debe cargar el <code>HomeController</code></li>
                <li><strong>Controlador:</strong> <code>HomeController::index()</code> se ejecutó y:
                    <ul>
                        <li>Cargó el modelo <code>User</code> para obtener datos</li>
                        <li>Preparó los datos para la vista</li>
                        <li>Cargó esta vista (<code>home/index.php</code>)</li>
                    </ul>
                </li>
                <li><strong>Modelo:</strong> <code>User::getAllUsers()</code> proporcionó los datos de usuarios</li>
                <li><strong>Vista:</strong> Esta página (que estás viendo) muestra los datos</li>
            </ol>
        </div>

        <!-- SECCIÓN DE USUARIOS -->
        <div class="users-section">
            <h3>👥 Usuarios de ejemplo (datos del modelo)</h3>
            <p>Estos datos vienen del modelo <code>User</code>. En una aplicación real, vendrían de una base de datos.</p>
            
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <div class="user-card">
                        <h4><?php echo htmlspecialchars($user['name']); ?></h4>
                        <p><strong>ID:</strong> <?php echo htmlspecialchars($user['id']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay usuarios disponibles.</p>
            <?php endif; ?>
        </div>

        <!-- EXPLICACIÓN MVC -->
        <div class="info-box extra">
            <h3>🏗️ Estructura MVC de esta aplicación</h3>
            <ul>
                <li><strong>📁 /app/controllers/</strong> - Controladores (HomeController.php)</li>
                <li><strong>📁 /app/models/</strong> - Modelos (User.php)</li>
                <li><strong>📁 /app/views/</strong> - Vistas (como esta página)</li>
                <li><strong>📁 /core/</strong> - Núcleo del framework (App.php, Controller.php, Model.php)</li>
                <li><strong>📁 /config/</strong> - Configuración (config.php)</li>
                <li><strong>📁 /public/</strong> - Punto de entrada (index.php)</li>
            </ul>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            <p>&copy; 2025 - <?php echo htmlspecialchars(APP_NAME); ?> (v<?php echo htmlspecialchars(APP_VERSION); ?>)</p>
            <p>Framework MVC educativo desarrollado en PHP</p>
        </div>
    </div>
</body>
</html>
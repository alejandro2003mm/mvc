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
        </div>

        <!-- NAVEGACIÓN -->
        <div class="nav">
            <a href="<?php echo BASE_URL; ?>">🏠 Inicio</a>
            <a href="<?php echo BASE_URL; ?>/home/about">ℹ️ Acerca de</a>
            <a href="<?php echo BASE_URL; ?>/home/mvc_info">📚 ¿Qué es MVC?</a>
            <a href="<?php echo BASE_URL; ?>/home/contact">📧 Contacto</a>
            <a href="<?php echo BASE_URL; ?>/home/personal">👤 Sobre mí</a>
        </div>

        <!-- INFORMACIÓN DE LA APLICACIÓN -->
        <div class="welcome-box">
            <h2>📱 Información de la Aplicación</h2>
            <p><strong>Nombre:</strong> <?php echo htmlspecialchars($appName); ?></p>
            <p><strong>Versión:</strong> <?php echo htmlspecialchars($appVersion); ?></p>
            <p><strong>Descripción:</strong> <?php echo htmlspecialchars($description); ?></p>
        </div>

        <!-- CARACTERÍSTICAS -->
        <div class="info-box uni">
            <h3>🚀 Características de este Framework MVC</h3>
            <ul>
                <?php foreach ($features as $feature): ?>
                    <li><?php echo htmlspecialchars($feature); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- OBJETIVO EDUCATIVO -->
        <div class="users-section">
            <h3>🎓 Objetivo Educativo</h3>
            <p>Este framework fue diseñado específicamente para estudiantes que están aprendiendo el patrón MVC. No está pensado para producción, sino como una herramienta de aprendizaje que permite:</p>
            <ul>
                <li>Entender cómo funcionan los frameworks MVC</li>
                <li>Practicar la separación de responsabilidades</li>
                <li>Aprender buenas prácticas de programación</li>
                <li>Comprender el flujo de datos en una aplicación web</li>
            </ul>
        </div>

        <!-- CÓMO EXTENDER -->
        <div class="info-box extra">
            <h3>🔧 ¿Cómo extender esta aplicación?</h3>
            <h4>Para agregar un nuevo controlador:</h4>
            <ol>
                <li>Crea un archivo en <code>/app/controllers/</code> llamado <code>TuControllerController.php</code></li>
                <li>Haz que extienda de la clase <code>Controller</code></li>
                <li>Agrega métodos públicos para cada acción</li>
                <li>Accede con <code>?controller=tucontroller&action=tuaccion</code></li>
            </ol>

            <h4>Para agregar un nuevo modelo:</h4>
            <ol>
                <li>Crea un archivo en <code>/app/models/</code> llamado <code>TuModelo.php</code></li>
                <li>Haz que extienda de la clase <code>Model</code></li>
                <li>Agrega métodos para manejar los datos</li>
                <li>Cárgalo desde un controlador con <code>$this->loadModel('tumodelo')</code></li>
            </ol>

            <h4>Para agregar una nueva vista:</h4>
            <ol>
                <li>Crea un archivo <code>.php</code> en <code>/app/views/</code></li>
                <li>Organízalo en carpetas por controlador</li>
                <li>Cárgalo desde un controlador con <code>$this->loadView('carpeta/vista', $datos)</code></li>
            </ol>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            <p>&copy; 2025 - <?php echo htmlspecialchars($appName); ?> (v<?php echo htmlspecialchars($appVersion); ?>)</p>
            <p>Framework MVC educativo desarrollado en PHP</p>
        </div>
    </div>
</body>
</html>
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

        .hobby-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            margin-right: 15px;
            border: 3px solid #3B82F6;
        }

        .user-card {
            display: flex;
            align-items: center;
            gap: 15px;
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

    <!-- WELCOME -->
    <div class="welcome-box">
        <h1>¡Bienvenido! Aquí encontraras información sobre mi 🎉</h1>
        <p><?php echo htmlspecialchars($sobremi); ?></p>
    </div>

    <!-- INFO UNIVERSIDAD -->
    <div class="info-box uni">
        <h2>🔍 Información sobre mi universidad </h2>
        <h3><strong>Universidad Politécnica Metropolitana de Puebla</strong></h3>

        <p>Mi universidad se encuentra ubicada en <strong>Calle Popocatépetl 3, 72573 Puebla</strong> y actualmente ofrece estas carreras:</p>

        <ol>
            <li>Ingeniería en Sistemas Computacionales</li>
            <li>Ingeniería en Biotecnología</li>
            <li>Ingeniería en Logística y Transportes</li>
            <li>Licenciatura en Administración y Gestión Empresarial</li>
        </ol>
    </div>

    <!-- USER HOBBIES -->
    <div class="users-section">
        <h2>👥 Pasatiempos / Hobbies</h2>
        <p>Estos son mis pasatiempos cuando tengo tiempo libre:</p>

        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <div class="user-card">
                    <img class="hobby-img"
                        src="<?php echo BASE_URL . '/assets/hobbies/' . htmlspecialchars($user['imagen']); ?>"
                        alt="<?php echo htmlspecialchars($user['hobby']); ?>">

                    <div>
                        <h4><?php echo htmlspecialchars($user['hobby']); ?></h4>
                        <p><strong>Frecuencia:</strong> <?php echo htmlspecialchars($user['frecuencia']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php else: ?>
            <p>No hay usuarios disponibles.</p>
        <?php endif; ?>
    </div>

    <!-- EXTRA INFO -->
    <div class="info-box extra">
        <h2>🏗️ <?php echo htmlspecialchars($subTitulo); ?></h2>
        <ul>
            <li><strong>📁 Futbol:</strong> Jugué en tercera división profesional en CAR Linces</li>
            <li><strong>📁 Universidad:</strong> Actualmente soy el 3er mejor promedio de mi carrera</li>
            <li><strong>📁 Familia:</strong> Somos 4 integrantes</li>
            <li><strong>📁 Miedos:</strong> Morir, decepcionar a alguien, no tener éxito</li>
            <li><strong>📁 Sueños:</strong> Tener un Mercedes y una casa con cancha de futbol y alberca</li>
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

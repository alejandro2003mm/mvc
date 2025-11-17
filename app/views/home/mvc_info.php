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
            background: #F1F5F9;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px 30px;
        }

        /* HEADER */
        .header {
            text-align: center;
            background: #4C1D95;
            color: white;
            padding: 20px;
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

        /* CAJA GENERAL DE SECCIÓN */
        .mvc-section {
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        /* COLORES PARA MODELO, VISTA, CONTROLADOR */
        .model-section {
            background: #DCFCE7;
            border-left: 6px solid #16A34A;
        }

        .view-section {
            background: #E0F2FE;
            border-left: 6px solid #0284C7;
        }

        .controller-section {
            background: #FEF9C3;
            border-left: 6px solid #EAB308;
        }

        /* BENEFICIOS */
        .benefits-section {
            background: #FFE4E6;
            border-left: 6px solid #F43F5E;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .benefits-section ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .benefits-section li {
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }

        .benefits-section li:last-child {
            border-bottom: none;
        }

        .benefits-section li::before {
            content: "⭐ ";
            font-weight: bold;
            color: #F43F5E;
        }

        /* DIAGRAMA */
        .flow-diagram {
            background: white;
            border-left: 6px solid #2563EB;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 25px;
        }

        .flow-step {
            display: inline-block;
            background: #EFF6FF;
            padding: 12px 16px;
            margin: 5px;
            border-radius: 6px;
            border: 2px solid #93C5FD;
            min-width: 130px;
            font-weight: bold;
        }

        .arrow {
            font-size: 24px;
            margin: 0 10px;
            color: #475569;
        }

        /* CÓDIGO */
        .code-example {
            background: #0F172A;
            color: #E2E8F0;
            padding: 15px;
            border-radius: 10px;
            font-family: Consolas, monospace;
            margin-top: 15px;
            overflow-x: auto;
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

    <!-- INTRO -->
    <div class="mvc-section view-section">
        <h2>🎯 ¿Qué es el patrón MVC?</h2>
        <p>MVC divide una aplicación en tres componentes para mejorar el orden, la escalabilidad y el mantenimiento.</p>
    </div>

    <!-- DIAGRAMA -->
    <div class="flow-diagram">
        <h3>📊 Flujo de datos en MVC</h3>
        <div style="margin: 20px 0;">
            <div class="flow-step">👤 Usuario</div>
            <span class="arrow">→</span>
            <div class="flow-step">🎮 Controlador</div>
            <span class="arrow">→</span>
            <div class="flow-step">📊 Modelo</div>
            <br><br>
            <div class="flow-step">👁️ Vista</div>
            <span class="arrow">←</span>
            <div class="flow-step">🎮 Controlador</div>
            <span class="arrow">←</span>
            <div class="flow-step">📊 Modelo</div>
        </div>
    </div>

    <!-- EXPLICACIÓN DE CADA COMPONENTE -->
    <?php foreach ($mvc_explanation as $component => $description): ?>
        <?php
        $sectionClass = '';
        $icon = '';

        if (strpos($component, 'Modelo') !== false) {
            $sectionClass = 'model-section';
            $icon = '📊';
        } elseif (strpos($component, 'Vista') !== false) {
            $sectionClass = 'view-section';
            $icon = '👁️';
        } elseif (strpos($component, 'Controlador') !== false) {
            $sectionClass = 'controller-section';
            $icon = '🎮';
        }
        ?>
        <div class="mvc-section <?php echo $sectionClass; ?>">
            <h3><?php echo $icon; ?> <?php echo htmlspecialchars($component); ?></h3>
            <p><?php echo htmlspecialchars($description); ?></p>

            <!-- CONTENIDOS DINÁMICOS -->
            <?php if (strpos($component, 'Modelo') !== false): ?>
                <h4>📋 Ejemplos del Modelo:</h4>
                <ul>
                    <li>Conexión con base de datos</li>
                    <li>Validación de datos</li>
                    <li>Reglas de negocio</li>
                    <li>Cálculos</li>
                </ul>
                <div class="code-example">
                    // Ejemplo en un Modelo  
                    public function getUserById($id){  
                        $query = "SELECT * FROM users WHERE id = :id";  
                        $stmt = $this->db->prepare($query);  
                        $stmt->bindParam(':id',$id);  
                        $stmt->execute();  
                        return $stmt->fetch();  
                    }
                </div>
            <?php endif; ?>

            <?php if (strpos($component, 'Vista') !== false): ?>
                <h4>🎨 Ejemplos de la Vista:</h4>
                <ul>
                    <li>Mostrar datos al usuario</li>
                    <li>Formularios</li>
                    <li>Mensajes de error</li>
                </ul>
                <div class="code-example">
                    &lt;h1&gt;&lt;?php echo $pageTitle; ?&gt;&lt;/h1&gt;
                    &lt;?php foreach($users as $user): ?&gt;
                        &lt;p&gt;&lt;?php echo $user['name']; ?&gt;&lt;/p&gt;
                    &lt;?php endforeach; ?&gt;
                </div>
            <?php endif; ?>

            <?php if (strpos($component, 'Controlador') !== false): ?>
                <h4>🔧 Ejemplos del Controlador:</h4>
                <ul>
                    <li>Procesar solicitudes</li>
                    <li>Validar formularios</li>
                    <li>Llamar modelos</li>
                </ul>
                <div class="code-example">
                    public function showUser($id){  
                        $model=$this->loadModel('user');  
                        $user=$model->getUserById($id);

                        if($user){
                            $this->loadView('user/show',['user'=>$user]);
                        }else{
                            $this->redirect('home','index');
                        }
                    }
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <!-- BENEFICIOS -->
    <div class="benefits-section">
        <h3>🌟 Beneficios del patrón MVC</h3>
        <ul>
            <?php foreach ($benefits as $benefit): ?>
                <li><?php echo htmlspecialchars($benefit); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- EJEMPLO PRÁCTICO -->
    <div class="mvc-section view-section">
        <h3>💡 Ejemplo práctico: ¿Cómo funciona esta página?</h3>
        <ol>
            <li><strong>👤 Usuario:</strong> Visita <code>/home/mvc_info</code></li>
            <li><strong>🎮 Controlador:</strong> Ejecuta <code>mvc_info()</code></li>
            <li><strong>👁️ Vista:</strong> Muestra esta página</li>
        </ol>
    </div>

    <!-- SIN MVC -->
    <div class="mvc-section controller-section">
        <h3>🔄 ¿Cómo sería sin MVC?</h3>
        <ul>
            <li>❌ Código mezclado</li>
            <li>❌ Difícil de mantener</li>
            <li>❌ Difícil de testear</li>
        </ul>
        <p>Con MVC todo está separado y limpio.</p>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <p>&copy; 2025 - Framework MVC Educativo</p>
        <p>¡Ahora ya sabes qué es MVC! 🎓</p>
    </div>

</div>

</body>
</html>

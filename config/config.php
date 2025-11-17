<?php
/**
 * ARCHIVO DE CONFIGURACIÓN
 * ========================
 * 
 * Aquí definimos todas las configuraciones básicas de nuestra aplicación:
 * - Configuración de base de datos
 * - URLs base
 * - Otras configuraciones globales
 */

// Configuración de la aplicación
define('APP_NAME', 'Mi Primera App MVC');
define('APP_VERSION', '1.0.0');

// URL base de la aplicación (ajusta según tu servidor)
// Para Apache con htdocs (XAMPP/WAMP/MAMP):
define('BASE_URL', 'http://localhost/mvc-main/');

// Si usas puerto diferente (ej: XAMPP en 8080):
// define('BASE_URL', 'http://localhost:8080/mvc-main');

// Si usas el servidor PHP integrado desde public/:
// define('BASE_URL', 'http://localhost:8000');

// Configuración de base de datos (para futuras implementaciones)
define('DB_HOST', 'localhost');
define('DB_NAME', 'mvc_app');
define('DB_USER', 'root');
define('DB_PASS', '');

// Configuración de desarrollo
define('DEBUG_MODE', true);

// Controlador y acción por defecto
define('DEFAULT_CONTROLLER', 'home');
define('DEFAULT_ACTION', 'index');
<?php
/**
 * Archivo principal del proyecto MVC
 * Este archivo es el primero que se ejecuta cuando alguien entra al sitio web.
 */

// Define una constante global llamada ROOT_PATH que guarda la ruta raíz del proyecto.
// dirname(__DIR__) obtiene la carpeta “padre” del directorio actual.
define('ROOT_PATH', dirname(__DIR__));

// Carga el archivo 
//Aquí se usa el punto (.) para **concatenar** la constante ROOT_PATH con el texto '/config/config.php'.
require_once ROOT_PATH . '/config/config.php';

// Carga los archivos
require_once ROOT_PATH . '/core/App.php';         // Se encarga de interpretar la URL y decidir qué controlador usar.
require_once ROOT_PATH . '/core/Controller.php';  // Clase base de todos los controladores, que manejan la lógica y las vistas.
require_once ROOT_PATH . '/core/Model.php';       // Clase base de los modelos, que se conectan con la base de datos y los datos.

// Crea una nueva instancia (objeto) de la aplicación principal llamada App.
// Luego llama al método run(), que pone en marcha toda la aplicación.
// En esta parte, el sistema analiza la URL, busca el controlador adecuado,
// ejecuta el método correspondiente y muestra la vista correcta al usuario.
$app = new App();
$app->run();

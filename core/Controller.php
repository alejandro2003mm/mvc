<?php
/**
 * CLASE BASE PARA TODOS LOS CONTROLADORES
 * =======================================
 * 
 * Esta clase contiene métodos útiles que pueden usar todos los controladores.
 * En el patrón MVC, los controladores manejan la lógica de la aplicación:
 * - Reciben las peticiones del usuario
 * - Interactúan con los modelos para obtener datos
 * - Preparan los datos para las vistas
 * - Cargan las vistas apropiadas
 */

class Controller 
{
    /**
     * Carga un modelo y devuelve una instancia de él
     * 
     * @param string $modelName Nombre del modelo (sin la extensión .php)
     * @return object Instancia del modelo
     */
    public function loadModel($modelName) // user  pasatiempo
    {
        // el valor de $modelName" es user
        // Construimos la ruta del archivo del modelo
        $modelFile = ROOT_PATH . '/app/models/' . ucfirst($modelName) . '.php';  //User.php       Pasatiempo.php
        
        // Verificamos si el archivo existe
        if (file_exists($modelFile)) {
            // Incluimos el archivo del modelo
            require_once $modelFile;


            //echo "</br>";
            //echo "Ver que tiene modelFile: " . $modelFile;
            
            // Creamos y devolvemos una instancia del modelo
            //echo "</br>";
            //echo "Ver que tiene modelName: " . $modelName;
            
            $modelClass = ucfirst($modelName);      //User        Pasatiempo

            //echo "</br>";
            //echo "Ver que tiene modelClass: " . $modelClass;

            
            return new $modelClass();
        } else {
            // Si el modelo no existe, lanzamos un error
            throw new Exception("El modelo '{$modelName}' no existe.");
        }
    }

    /**
     * Carga una vista y le pasa datos
     * 
     * @param string $viewName Nombre de la vista (ruta relativa desde views/)
     * @param array $data Datos para pasar a la vista
     */
    public function loadView($viewName, $data = []) // valor de vieName:  home/contact
    {
        //echo "<br>";
        //echo "Valor de viewName: " . $viewName . "</br>";



        // Construimos la ruta del archivo de la vista
        $viewFile = ROOT_PATH . '/app/views/' . $viewName . '.php'; // valor: C:\xampp\htdocs\mvc-main/app/views/home/contact.php

        //echo  "Valor de viewFile: " . $viewFile;
        
        // Verificamos si el archivo de la vista existe
        if (file_exists($viewFile)) {
            // Extraemos los datos para que estén disponibles en la vista
            // extract() convierte las claves del array en variables
            // Por ejemplo: ['titulo' => 'Hola'] se convierte en $titulo = 'Hola'
            extract($data);

        //       $data = [
        //     'pageTitle' => 'Bienvenido al MVC en PHP', // Título que aparecerá en la página
        //     'welcomeMessage' => '¡Hola! Esta es tu primera aplicación MVC en PHP.', // Mensaje principal
        //     'description' => 'El patrón MVC separa la lógica de negocio, la presentación y el control de flujo.', // Texto explicativo
        //     'users' => $users, // Lista de usuarios obtenidos del modelo
        //     'currentDate' => date('d/m/Y H:i:s') // Guarda la fecha y hora actual (formato: día/mes/año hora:minuto:segundo)
        // ];
            
            // Incluimos la vista
            require_once $viewFile;
        } else {
            // Si la vista no existe, mostramos un error
            throw new Exception("La vista '{$viewName}' no existe.");
        }
    }

    /**
     * Redirige a otra página
     * 
     * @param string $controller Controlador de destino
     * @param string $action Acción de destino
     * @param array $params Parámetros adicionales
     */
    public function redirect($controller = 'home', $action = 'index', $params = []) 
    {
        // Construimos la URL de redirección
        $url = BASE_URL . '?controller=' . $controller . '&action=' . $action;
        
        // Si hay parámetros, los agregamos
        if (!empty($params)) {
            $url .= '&params=' . implode('/', $params);
        }
        
        // Realizamos la redirección
        header('Location: ' . $url);
        exit();
    }

    /**
     * Obtiene un valor de $_POST de forma segura
     * 
     * @param string $key Clave del dato en $_POST
     * @param mixed $default Valor por defecto si no existe
     * @return mixed
     */
    public function getPost($key, $default = null) // $key= name / email/ message
    {
        //trim — Elimina los espacios (u otros caracteres) al inicio y al final de un string
        return isset($_POST[$key]) ? trim($_POST[$key]) : $default;
    }

    /**
     * Obtiene un valor de $_GET de forma segura
     * 
     * @param string $key Clave del dato en $_GET
     * @param mixed $default Valor por defecto si no existe
     * @return mixed
     */
    public function getGet($key, $default = null) 
    {
        return isset($_GET[$key]) ? trim($_GET[$key]) : $default;
    }

    /**
     * Verifica si la petición es POST
     * 
     * @return bool
     */
    public function isPost() 
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
}
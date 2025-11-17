<?php
/**
 * CLASE PRINCIPAL DE LA APLICACIÓN (ROUTER)
 * ------------------------------------------
 * Esta clase es el "cerebro" del proyecto MVC.
 * Su trabajo principal es:
 * 1. Leer la URL o los parámetros enviados por el usuario.
 * 2. Decidir qué controlador y método (acción) ejecutar.
 * 3. Crear ese controlador.
 * 4. Ejecutar el método correspondiente con los datos recibidos.
 */

// La palabra reservada "class" se usa para definir una clase en PHP.
class App
{
    // Palabra reservada "private" → la variable solo puede usarse dentro de esta clase.
    private $controller;  // Guarda el nombre del controlador que se debe ejecutar.
    private $action;      // Guarda el nombre del método (acción) del controlador.
    private $params = []; // Guarda los valores adicionales que vienen en la URL.

    // "public function __construct()" → método especial que se ejecuta automáticamente
    // cuando se crea un nuevo objeto de esta clase. Sirve para preparar el entorno.
    public function __construct()
    {
        // Se analiza la URL y se llenan las variables $controller= home, $action= about y $params = [].
        $this->parseUrl();
    }

    // Palabra reservada "public" → permite que el método sea llamado desde cualquier parte del programa.
    // "function" → se usa para declarar una función o método.
    public function run()
    {
        try {
            // Se construye la ruta completa donde debería estar el archivo del controlador.
            // ROOT_PATH es la carpeta raíz del proyecto
            // ucfirst() convierte la primera letra del nombre del controlador en mayúscula (home → Home).
            // Al final, se forma algo así:
            // C:\Users\Lenovo\Desktop\xampp\htdocs\php_mvc_ejemplo-main/app/controllers/HomeController.php
            // $controllerFile le dice a la aplicación “dónde está el código del controlador que debo ejecutar”.
            $controllerFile = ROOT_PATH . '/app/controllers/' . ucfirst($this->controller) . 'Controller.php';
            //echo "Imprime lo que viene de la variable CONTROLLERFILE: " . $controllerFile . "</br>";
            // "if" → estructura condicional.
            // "!" significa "no", por lo tanto "!file_exists" significa "si el archivo NO existe".
            // Si el archivo del controlador no está en esa ruta, se lanza un error.
            if (!file_exists($controllerFile)) {      // valor de $controllerFile = HomeController.php
                // "throw new Exception" → lanza un error que será capturado por el bloque catch.
                throw new Exception("El controlador '{$this->controller}' no existe.");  
            }

            // "require_once" → incluye el archivo una sola vez, evita duplicados.
            // En este caso, carga el archivo del controlador encontrado.
            // Ejemplo: carga el archivo HomeController.php dentro del sistema.
            require_once $controllerFile;
        
            // Crea el nombre de la clase del controlador.
            // ucfirst($this->controller) → pone la primera letra en mayúscula.
            // Se agrega la palabra “Controller” al final.
            // Resultado guardado en la variable:
            // $controllerClass = "HomeController"
            $controllerClass = ucfirst($this->controller) . 'Controller';
            //echo "Imprime lo que viene de la variable CONTROLLERCLASS: " . $controllerClass;

            // "class_exists" verifica si la clase realmente existe dentro del archivo incluido.
            if (!class_exists($controllerClass)) {
                throw new Exception("La clase '{$controllerClass}' no existe.");
            }

            // Se crea una nueva instancia (objeto) del controlador.
            // "$variable = new Clase()" → crea un nuevo objeto a partir de esa clase.
            // Ejemplo: $controllerInstance = new HomeController();
            $controllerInstance = new $controllerClass();
            

            // Verifica si el método (acción) que se quiere ejecutar realmente existe dentro del controlador.
            if (!method_exists($controllerInstance, $this->action)) {
                throw new Exception("El método '{$this->action}' no existe en '{$controllerClass}'.");
            }

            // "call_user_func_array" ejecuta una función o método y le pasa los parámetros en forma de arreglo.
            // Aquí se ejecuta el método del controlador con los parámetros obtenidos de la URL.
            // Ejemplo:
            // URL: /home/editar/5
            // Ejecuta: HomeController->editar("5");
            call_user_func_array([$controllerInstance, $this->action], $this->params);

        } catch (Exception $e) {
            // Si ocurre un error, se muestra un mensaje amigable al usuario.
            $this->showError($e->getMessage());
        }
    }

    // Este método analiza la URL para separar controlador, acción y parámetros.
    private function parseUrl()
    {
        // "isset" → verifica si una variable está definida o es nula.
        //echo "URL POR DEFECTO EN LA VARIBALE CONTROLLER en la URL tradicional: " . isset($_GET['controller']) . "</br>";
        //echo "URL POR DEFECTO EN LA VARIABLE ACTION en la URL tradicional: " . isset($_GET['action']) . "</br>";

        if (isset($_GET['controller']) || isset($_GET['action'])) {
            // Si se usan parámetros tradicionales (?controller=home&action=index)
            // Se guarda el valor de “controller” o el valor por defecto si no está definido.
            // Ejemplo: $this->controller = "home"
            $this->controller = isset($_GET['controller']) ? $_GET['controller'] : DEFAULT_CONTROLLER;

            // Se guarda el valor de “action” o el valor por defecto si no está definido.
            // Ejemplo: $this->action = "index"
            $this->action = isset($_GET['action']) ? $_GET['action'] : DEFAULT_ACTION;
            

            // Si hay parámetros extra en la URL 
            // se separan en un arreglo ["10", "editar"] y se guardan en $this->params.
            if (isset($_GET['params'])) {
                // "explode" → divide el texto usando "/" y lo convierte en un arreglo
                $this->params = explode('/', $_GET['params']);
            }
        } else {
            //echo "URL POR DEFECTO EN LA VARIABLE URL dentro de la condicional de las URL's amigables: " . isset($_GET['url']) . "</br>";

            // Si se usan URLs amigables (tipo /controller/action/param1/param2)
            if (isset($_GET['url'])) {
                // "rtrim" → elimina la barra final "/"
                // "filter_var" → limpia el texto de caracteres peligrosos
                // "explode" → divide el texto usando "/" y lo convierte en un arreglo
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);

                // Primer parte de la URL = controlador.
                // Si no existe, se usa el controlador por defecto.
                // Ejemplo: URL = /home/index → $this->controller = "home"
                $this->controller = isset($url[0]) && !empty($url[0]) ? $url[0] : DEFAULT_CONTROLLER;

                // Segunda parte de la URL = acción.
                // Ejemplo: URL = /home/index → $this->action = "index"
                $this->action = isset($url[1]) && !empty($url[1]) ? $url[1] : DEFAULT_ACTION;

                // Las partes restantes = parámetros (si existen).
                //array_slice en PHP es una función que permite extraer una porción de un arreglo
                // Ejemplo: /home/editar/5 → $this->params = ["5"]
                $this->params = isset($url[2]) ? array_slice($url, 2) : [];

                //echo "URL POR DEFECTO EN LA VARIBALE CONTROLLER en el else: " . $this->controller . "</br>";
                //echo "URL POR DEFECTO EN LA VARIABLE ACTION en el else: " . $this->action . "</br>";
                
            } else {

                //echo "URL POR DEFECTO EN LA VARIBALE CONTROLLER en el segundo else: " . $this->controller . "</br>";
                //echo "URL POR DEFECTO EN LA VARIABLE ACTION en el segundo else: " . $this->action . "</br>";
                // Si no hay ningún parámetro en la URL, se usan los valores por defecto.
                // Ejemplo: controlador = "home", acción = "mvc_info", sin parámetros.
                $this->controller = DEFAULT_CONTROLLER;
                $this->action = DEFAULT_ACTION;
                $this->params = [];

                //echo "URL POR DEFECTO EN LA VARIBALE CONTROLLER en el segundo else despues del default: " . $this->controller . "</br>";
                //echo "URL POR DEFECTO EN LA VARIABLE ACTION en el segundo else despues del deafult : " . $this->action . "</br>";
            }
        }

        // Limpieza de los valores para mayor seguridad.
        // El método sanitize elimina símbolos o caracteres no permitidos.
        $this->controller = $this->sanitize($this->controller); //Valor de controlles es 'home'
        $this->action = $this->sanitize($this->action);  //Valor de action es 'about'
    }

    // Este método limpia una cadena para evitar caracteres no válidos o peligrosos.
    private function sanitize($string)
    {
        // "preg_replace" → busca texto y lo reemplaza.
        // Aquí elimina todo lo que no sea letras, números o guiones bajos.
        // Ejemplo: "user@123" → "user123"
        return preg_replace('/[^a-zA-Z0-9_]/', '', $string);
    }

    // Muestra un mensaje de error de forma clara para el usuario.
    private function showError($message): void
    { 
        // Si el modo depuración (DEBUG_MODE) está activado, se muestra el error completo.
        // htmlspecialchars : Convierte caracteres especiales en entidades HTML
        if (DEBUG_MODE) {
            echo "<h1>Error en la aplicación</h1>";
            echo "<p><strong>Mensaje:</strong> " . htmlspecialchars($message) . "</p>";
            echo "<p><strong>Controlador solicitado:</strong> " . htmlspecialchars($this->controller) . "</p>";
            echo "<p><strong>Acción solicitada:</strong> " . htmlspecialchars($this->action) . "</p>";
        } else {
            // Si el modo depuración está apagado, se muestra solo un mensaje genérico.
            echo "<h1>Error 404</h1><p>Página no encontrada.</p>";
        }
    }
}

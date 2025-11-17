<?php
/**
 * CONTROLADOR HOME
 * =================
 * 
 * Este controlador se encarga de manejar las páginas principales del sitio (inicio, acerca de, contacto, etc.).
 * 
 * En el patrón MVC:
 * - Los **controladores** reciben las peticiones del usuario (por ejemplo, URLs).
 * - Procesan la lógica necesaria.
 * - Piden datos al **modelo** (si los necesitan).
 * - Y luego cargan una **vista**, enviándole esos datos.
 * 
 * Este controlador hereda (extiende) de la clase base "Controller",
 * lo que le permite usar métodos como loadModel() y loadView().
 */

// Palabra reservada "class" → se usa para definir una clase.
// "extends" → indica que esta clase hereda propiedades y métodos de otra clase (en este caso, de Controller).
class HomeController extends Controller 
{
    /**
     * MÉTODO INDEX
     * -------------
     * Palabra reservada "public" → el método puede ser llamado desde cualquier parte del programa.
     * Este método se ejecuta cuando la URL no especifica ninguna acción.
     */
    public function index() 
    {
        // Cargar el modelo "User" para poder acceder a sus métodos.
        // "loadModel('user')" devuelve un objeto del modelo UserModel.
        // El resultado se guarda en la variable $userModel.
        $userModel = $this->loadModel('user');   //User

        // Llamamos al método getAllUsers() del modelo.
        // Este método devuelve una lista (array) con todos los usuarios registrados.
        // Ejemplo de valor guardado: [["id"=>1,"nombre"=>"Ana"], ["id"=>2,"nombre"=>"Luis"]]
        $users = $userModel->getAllUsers();

        // Preparamos los datos que se enviarán a la vista.
        // Creamos un arreglo (array asociativo) llamado $data con claves y valores.
        // Cada clave representará una variable que podrá usarse dentro de la vista.
        $data = [
            'pageTitle' => 'Bienvenido al MVC en PHP', // Título que aparecerá en la página
            'welcomeMessage' => '¡Hola! Esta es tu primera aplicación MVC en PHP.', // Mensaje principal
            'description' => 'El patrón MVC separa la lógica de negocio, la presentación y el control de flujo.', // Texto explicativo
            'users' => $users, // Lista de usuarios obtenidos del modelo
            'currentDate' => date('d/m/Y H:i:s') // Guarda la fecha y hora actual (formato: día/mes/año hora:minuto:segundo)
        ];

        // Cargamos la vista llamada "home/index" y le pasamos el array $data.
        // El método loadView() se encarga de mostrar el HTML correspondiente y recibir los datos.
        $this->loadView('home/index', $data);
    }

    /**
     * MÉTODO ABOUT
     * -------------
     * Muestra una página con información sobre la aplicación.
     * Se ejecuta con: ?controller=home&action=about
     */
    public function about() 
    {
        // Creamos un array con la información que queremos mostrar en la vista "about".
        $data = [
            'pageTitle' => 'Acerca de nuestra aplicación MVC',
            'appName' => APP_NAME,         // Constante definida en config.php con el nombre de la app
            'appVersion' => APP_VERSION,   // Versión de la aplicación (por ejemplo, "1.0")
            'description' => 'Esta aplicación demuestra cómo funciona el patrón MVC (Modelo-Vista-Controlador) en PHP.',
            'features' => [ // Lista de características principales que se mostrarán en forma de lista en la vista
                'Separación clara de responsabilidades',
                'Código reutilizable y mantenible',
                'Estructura organizada',
                'Fácil de extender y modificar'
            ]
        ];

        // Se carga la vista "home/about" y se le pasa el array con los datos.
        $this->loadView('home/about', $data);
    }

    /**
     * MÉTODO MVC_INFO
     * ----------------
     * Muestra una página educativa que explica qué es el patrón MVC.
     * Se accede con: ?controller=home&action=mvc_info
     */
    public function mvc_info() 
    {
        // Creamos un array con toda la información que queremos mostrar en la vista.
        $data = [
            'pageTitle' => '¿Qué es MVC?',
            'mvc_explanation' => [ // Explicación de las tres partes del patrón
                'M - Modelo' => 'Se encarga de los datos y la lógica de negocio. Interactúa con la base de datos.',
                'V - Vista' => 'Se encarga de la presentación. Es lo que ve el usuario (HTML, CSS, JS).',
                'C - Controlador' => 'Coordina el modelo y la vista. Procesa las peticiones del usuario.'
            ],
            'benefits' => [ // Lista de beneficios del patrón MVC
                'Separación de responsabilidades',
                'Código más organizado y mantenible',
                'Reutilización de componentes',
                'Facilita el trabajo en equipo',
                'Facilita las pruebas unitarias'
            ]
        ];

        // Se carga la vista "home/mvc_info" y se le pasan los datos preparados.
        $this->loadView('home/mvc_info', $data);
    }

    /**
     * MÉTODO CONTACT
     * ---------------
     * Muestra un formulario de contacto.
     * Se accede con: ?controller=home&action=contact
     */
    public function contact() 
    {
        // Array con la información inicial del formulario.
        // "message" y "messageType" se usarán para mostrar mensajes en la vista.
        $data = [
            'pageTitle' => 'Formulario de Contacto',
            'message' => '',
            'messageType' => ''
        ];

        // "if ($this->isPost())" → verifica si el formulario se envió usando el método POST.
        if ($this->isPost()) {
            // Obtenemos los datos enviados desde el formulario HTML.
            // "getPost('campo')" obtiene el valor del input con ese nombre.
            $name = $this->getPost('name');     // Nombre del usuario
            $email = $this->getPost('email');   // Correo electrónico
            $message = $this->getPost('message'); // Mensaje escrito

            //  Validamos los datos enviados:
            if (empty($name) || empty($email) || empty($message)) {
                // Si algún campo está vacío, se guarda un mensaje de error en $data.
                $data['message'] = 'Todos los campos son obligatorios.';
                $data['messageType'] = 'error';
            } 
            // "elseif" → se ejecuta solo si la condición anterior NO se cumplió.
            // !filter_var : Checa si $email es una direccion de email valida:
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Si el correo no es válido, se guarda otro mensaje de error.
                $data['message'] = 'Por favor, introduce un email válido.';
                $data['messageType'] = 'error';
            } 
            else {
                // Si los datos son válidos:
                // En una aplicación real aquí podríamos guardar el mensaje en la base de datos o enviar un correo.
                // "htmlspecialchars" convierte caracteres especiales en entidades html.
                $data['message'] = '¡Gracias por tu mensaje, ' . htmlspecialchars($name) . '! Te contactaremos pronto.';
                $data['messageType'] = 'success';
            }
        }

        // Finalmente, cargamos la vista del formulario (home/contact) y le pasamos los mensajes y valores.
        $this->loadView('home/contact', $data);
    }


    /**
     * MÉTODO PERSONAL
     * ----------------
     * Muestra información personal del desarrollador.
     * URL de acceso:
     *   - Con parámetros tradicionales: ?controller=home&action=personal
     *   - Con URL amigable: /home/personal
     */
    public function personal()
    {

        $pasatiempoModel = $this->loadModel('pasatiempo');

        // Llamamos al método getAllUsers() del modelo.
        // Este método devuelve una lista (array) con todos los usuarios registrados.
        // Ejemplo de valor guardado: [["id"=>1,"nombre"=>"Ana"], ["id"=>2,"nombre"=>"Luis"]]

        $pasatiempos = $pasatiempoModel->getAllPasatiempos();


        $data = [
            'pageTitle' => 'Información sobre mi', // Título que aparecerá en la página
            'sobremi' => '¡Hola! Mi nombre es Alejandro Medina Melendez y tengo 22 años, actualmente me encuentro estudiando la carrera de ISC.', // Mensaje principal
            'subTitulo' => 'Información extra sobre mi', // Texto explicativo
            'users' => $pasatiempos // Lista de usuarios obtenidos del modelo
        ];

        $this->loadView('home/personal', $data);
    }

}

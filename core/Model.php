<?php
/**
 * CLASE BASE PARA TODOS LOS MODELOS
 * =================================
 * 
 * Esta clase contiene funcionalidades comunes para todos los modelos.
 * En el patrón MVC, los modelos se encargan de:
 * - Manejar los datos de la aplicación
 * - Interactuar con la base de datos
 * - Aplicar reglas de negocio
 * - Validar datos
 */

class Model 
{
    /**
     * Conexión a la base de datos (para implementaciones futuras)
     */
    protected $db;

    /**
     * Constructor de la clase
     * Aquí podríamos inicializar la conexión a la base de datos
     */
    public function __construct() 
    {
        // Por ahora no implementamos base de datos real
        // En el futuro aquí iría: $this->db = new PDO(...);
    }

    /**
     * Método para simular consultas a la base de datos
     * Este es solo un ejemplo educativo
     * 
     * @param string $table Nombre de la tabla
     * @param array $conditions Condiciones de búsqueda
     * @return array Datos simulados
     */
    protected function select($table, $conditions = []) 
    {
        // En una aplicación real, aquí haríamos una consulta SQL
        // Por ahora, devolvemos datos simulados para propósitos educativos
        //echo "</br>";
        //echo "Valor de table: " . $table;  //users

        $sampleData = [
            'users' => [
                ['id' => 1, 'name' => 'Juan Pérez', 'email' => 'juan@email.com'],
                ['id' => 2, 'name' => 'María García', 'email' => 'maria@email.com'],
                ['id' => 3, 'name' => 'Carlos López', 'email' => 'carlos@email.com']
            ],
            'pasatiempos' => [
                ['id' => 1, 'hobby' => 'Jugar Futbol', 'frecuencia' => 'Los domingos de cada semana', 'imagen' => 'futbol.jpg'],
                ['id' => 2, 'hobby' => 'Escuchar Musica', 'frecuencia' => 'Cada que hago tarea', 'imagen' => 'musica.jpg'],
                ['id' => 3, 'hobby' => 'Pasar tiempo con mi familia', 'frecuencia' => 'Todos los dias', 'imagen' => 'familia.jpg'],
                ['id' => 4, 'hobby' => 'Ver peliculas de terror', 'frecuencia' => 'Por lo menos una vez a la semana',  'imagen' => 'terror.jpg'],
                ['id' => 5, 'hobby' => 'Salir con mis amigos', 'frecuencia' => 'Por lo menos una vez a la semana', 'imagen' => 'amigos.jpg']
            ]
        ];

        // Devolvemos los datos de la tabla solicitada o un array vacío
        return isset($sampleData[$table]) ? $sampleData[$table] : []; 
    }

    /**
     * Método para simular inserción de datos
     * 
     * @param string $table Nombre de la tabla
     * @param array $data Datos a insertar
     * @return bool Éxito de la operación
     */
    protected function insert($table, $data) 
    {
        // En una aplicación real, aquí ejecutaríamos un INSERT SQL
        // Por ahora simulamos que la operación fue exitosa
        return true;
    }

    /**
     * Método para simular actualización de datos
     * 
     * @param string $table Nombre de la tabla
     * @param array $data Datos a actualizar
     * @param array $conditions Condiciones WHERE
     * @return bool Éxito de la operación
     */
    protected function update($table, $data, $conditions) 
    {
        // En una aplicación real, aquí ejecutaríamos un UPDATE SQL
        // Por ahora simulamos que la operación fue exitosa
        return true;
    }

    /**
     * Método para simular eliminación de datos
     * 
     * @param string $table Nombre de la tabla
     * @param array $conditions Condiciones WHERE
     * @return bool Éxito de la operación
     */
    protected function delete($table, $conditions) 
    {
        // En una aplicación real, aquí ejecutaríamos un DELETE SQL
        // Por ahora simulamos que la operación fue exitosa
        return true;
    }

    /**
     * Valida que un email sea válido
     * 
     * @param string $email
     * @return bool
     */
    protected function validateEmail($email) 
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Limpia una cadena de texto
     * 
     * @param string $string
     * @return string
     */
    protected function sanitizeString($string) 
    {
        return htmlspecialchars(trim($string), ENT_QUOTES, 'UTF-8');
    }
}
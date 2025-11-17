<?php
/**
 * MODELO USER
 * ===========
 * 
 * Este modelo maneja todo lo relacionado con los usuarios.
 * Los modelos son responsables de:
 * - Obtener datos (de base de datos, APIs, archivos, etc.)
 * - Validar datos
 * - Aplicar reglas de negocio
 * - Procesar información antes de enviarla al controlador
 * 
 * Este modelo extiende de la clase Model que contiene métodos útiles.
 */

class Pasatiempo extends Model 
{
    /**
     * Obtiene todos los usuarios
     * En una aplicación real, esto haría una consulta a la base de datos
     * 
     * @return array Lista de usuarios
     */
    public function getAllPasatiempos() 
    {
        // Usamos el método select() heredado de la clase Model
        // que por ahora devuelve datos simulados
        return $this->select('pasatiempos');
    }

    /**
     * Obtiene un usuario específico por su ID
     * 
     * @param int $userId ID del usuario
     * @return array|null Datos del usuario o null si no existe
     */
    public function getUserById($userId) 
    {
        // Obtenemos todos los usuarios
        $users = $this->getAllPasatiempos();
        
        // Buscamos el usuario con el ID especificado
        foreach ($users as $user) {
            if ($user['id'] == $userId) {
                return $user;
            }
        }
        
        // Si no se encuentra, devolvemos null
        return null;
    }

    /**
     * Obtiene usuarios por su nombre (búsqueda parcial)
     * 
     * @param string $name Nombre o parte del nombre a buscar
     * @return array Lista de usuarios que coinciden
     */
    public function getUsersByName($name) 
    {
        $users = $this->getAllPasatiempos();
        $results = [];
        
        // Convertimos el nombre a minúsculas para búsqueda insensible a mayúsculas
        $searchName = strtolower($name);
        
        foreach ($users as $user) {
            // Si el nombre del usuario contiene el texto buscado
            if (strpos(strtolower($user['name']), $searchName) !== false) {
                $results[] = $user;
            }
        }
        
        return $results;
    }

    /**
     * Crea un nuevo usuario
     * En una aplicación real, esto insertaría el usuario en la base de datos
     * 
     * @param array $userData Datos del usuario
     * @return bool|int ID del usuario creado o false si hay error
     */
    public function createUser($userData) 
    {
        // Validamos los datos antes de crear el usuario
        if (!$this->validateUserData($userData)) {
            return false;
        }
        
        // Limpiamos los datos
        $cleanData = [
            'name' => $this->sanitizeString($userData['name']),
            'email' => $this->sanitizeString($userData['email'])
        ];
        
        // En una aplicación real, aquí haríamos el INSERT en la base de datos
        // Por ahora simulamos que se creó exitosamente
        $success = $this->insert('users', $cleanData);
        
        if ($success) {
            // Simulamos que el ID del nuevo usuario es 4
            return 4;
        }
        
        return false;
    }

    /**
     * Actualiza los datos de un usuario
     * 
     * @param int $userId ID del usuario
     * @param array $userData Nuevos datos
     * @return bool Éxito de la operación
     */
    public function updateUser($userId, $userData) 
    {
        // Validamos que el usuario existe
        if (!$this->getUserById($userId)) {
            return false;
        }
        
        // Validamos los nuevos datos
        if (!$this->validateUserData($userData)) {
            return false;
        }
        
        // Limpiamos los datos
        $cleanData = [
            'name' => $this->sanitizeString($userData['name']),
            'email' => $this->sanitizeString($userData['email'])
        ];
        
        // En una aplicación real, aquí haríamos el UPDATE en la base de datos
        return $this->update('users', $cleanData, ['id' => $userId]);
    }

    /**
     * Elimina un usuario
     * 
     * @param int $userId ID del usuario
     * @return bool Éxito de la operación
     */
    public function deleteUser($userId) 
    {
        // Validamos que el usuario existe
        if (!$this->getUserById($userId)) {
            return false;
        }
        
        // En una aplicación real, aquí haríamos el DELETE en la base de datos
        return $this->delete('users', ['id' => $userId]);
    }

    /**
     * Valida los datos de un usuario
     * 
     * @param array $userData Datos a validar
     * @return bool True si los datos son válidos
     */
    private function validateUserData($userData) 
    {
        // Verificamos que los campos requeridos estén presentes
        if (empty($userData['name']) || empty($userData['email'])) {
            return false;
        }
        
        // Verificamos que el nombre tenga al menos 2 caracteres
        if (strlen(trim($userData['name'])) < 2) {
            return false;
        }
        
        // Verificamos que el email sea válido
        if (!$this->validateEmail($userData['email'])) {
            return false;
        }
        
        return true;
    }

    /**
     * Obtiene estadísticas de usuarios
     * Este es un ejemplo de cómo los modelos pueden procesar datos
     * 
     * @return array Estadísticas
     */
    public function getUserStats() 
    {
        $users = $this->getAllPasatiempos();
        
        return [
            'total_users' => count($users),
            'users_with_gmail' => $this->countUsersByEmailDomain($users, 'gmail.com'),
            'average_name_length' => $this->calculateAverageNameLength($users),
            'last_updated' => date('Y-m-d H:i:s')
        ];
    }

    /**
     * Cuenta usuarios que usan un dominio de email específico
     */
    private function countUsersByEmailDomain($users, $domain) 
    {
        $count = 0;
        foreach ($users as $user) {
            if (strpos($user['email'], '@' . $domain) !== false) {
                $count++;
            }
        }
        return $count;
    }

    /**
     * Calcula la longitud promedio de los nombres
     */
    private function calculateAverageNameLength($users) 
    {
        if (empty($users)) {
            return 0;
        }
        
        $totalLength = 0;
        foreach ($users as $user) {
            $totalLength += strlen($user['name']);
        }
        
        return round($totalLength / count($users), 2);
    }
}
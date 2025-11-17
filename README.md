# 📚 Framework MVC Básico en PHP

## 🎯 Objetivo

Este es un framework MVC educativo diseñado para estudiantes que están aprendiendo el patrón Modelo-Vista-Controlador. Es simple, bien comentado y fácil de entender.

## 🏗️ Estructura del Proyecto

```
mvc-main/
├── app/
│   ├── controllers/
│   │   └── HomeController.php      # Controlador principal
│   ├── models/
│   │   └── User.php               # Modelo de ejemplo
│   └── views/
│       └── home/
│           ├── index.php          # Página principal
│           ├── about.php          # Página "acerca de"
│           ├── mvc_info.php       # Explicación del MVC
│           └── contact.php        # Formulario de contacto
├── config/
│   └── config.php                 # Configuración de la aplicación
├── core/
│   ├── App.php                    # Router principal
│   ├── Controller.php             # Clase base para controladores
│   └── Model.php                  # Clase base para modelos
├── public/
│   └── index.php                  # Punto de entrada de la aplicación
└── README.md                      # Este archivo
```

## 🚀 Cómo ejecutar

### Opción 1: Servidor PHP integrado (Recomendado para pruebas)

```bash
# Navega a la carpeta public/
cd /path/to/mvc-main/public

# Inicia el servidor PHP
php -S localhost:8000

# Abre tu navegador en: http://localhost:8000
```

### Opción 2: Apache/Nginx

1. Coloca el proyecto en tu servidor web
2. Asegúrate de que Apache tenga `mod_rewrite` habilitado
3. El punto de entrada es `public/index.php`

## 🌐 URLs de ejemplo

- **Página principal**: `http://localhost:8000/`
- **Acerca de**: `http://localhost:8000/?controller=home&action=about`
- **¿Qué es MVC?**: `http://localhost:8000/?controller=home&action=mvc_info`
- **Contacto**: `http://localhost:8000/?controller=home&action=contact`

## 📋 Características

### ✅ Lo que incluye

- [x] Enrutamiento básico con parámetros GET
- [x] Separación clara de Modelo-Vista-Controlador
- [x] Clase base para controladores con métodos útiles
- [x] Clase base para modelos con simulación de base de datos
- [x] Manejo de formularios y validación
- [x] Comentarios explicativos en todo el código
- [x] Ejemplos prácticos y educativos
- [x] Diseño responsive básico con CSS

### ❌ Lo que NO incluye (a propósito)

- [ ] Conexión real a base de datos
- [ ] Sistema de autenticación
- [ ] Manejo de sesiones
- [ ] Validación CSRF
- [ ] Caché
- [ ] Logs
- [ ] Framework CSS externo

## 🎓 Cómo aprender con este framework

### 1. Explora el flujo de datos
1. Abre `public/index.php` - es el punto de entrada
2. Sigue cómo `core/App.php` analiza la URL
3. Ve cómo se carga `app/controllers/HomeController.php`
4. Observa cómo el controlador carga modelos y vistas

### 2. Experimenta
- Modifica el contenido de las vistas
- Agrega nuevos métodos al controlador
- Crea nuevos datos en el modelo
- Prueba URLs diferentes

### 3. Extiende la aplicación
- Crea un nuevo controlador (ej: `ProductController.php`)
- Agrega un nuevo modelo (ej: `Product.php`)
- Crea nuevas vistas para tu controlador

## 🔧 Cómo extender

### Crear un nuevo controlador

1. Crea `app/controllers/TuControllerController.php`:

```php
<?php
class TuControllerController extends Controller 
{
    public function index() 
    {
        $data = ['mensaje' => 'Hola desde mi controlador'];
        $this->loadView('tucontroller/index', $data);
    }
}
```

2. Crea la vista `app/views/tucontroller/index.php`
3. Accede con: `?controller=tucontroller&action=index`

### Crear un nuevo modelo

1. Crea `app/models/TuModelo.php`:

```php
<?php
class TuModelo extends Model 
{
    public function getTodos() 
    {
        // Tu lógica aquí
        return $this->select('tu_tabla');
    }
}
```

2. Úsalo en un controlador:

```php
$modelo = $this->loadModel('tumodelo');
$datos = $modelo->getTodos();
```

## 💡 Conceptos clave que aprenderás

### Modelo (Model)
- Maneja los datos de la aplicación
- Interactúa con la base de datos
- Contiene la lógica de negocio
- Valida y procesa información

### Vista (View)
- Se encarga de la presentación
- Muestra datos al usuario
- Contiene HTML, CSS y JavaScript
- No contiene lógica de negocio

### Controlador (Controller)
- Coordina modelos y vistas
- Procesa las peticiones del usuario
- Maneja la lógica de la aplicación
- Actúa como intermediario

## 🐛 Solución de problemas

### Error: "El controlador 'X' no existe"
- Verifica que el archivo esté en `app/controllers/`
- El nombre debe ser `XController.php` (primera letra mayúscula)
- La clase debe llamarse `XController`

### Error: "La vista 'X' no existe"
- Verifica que el archivo esté en `app/views/`
- Usa la ruta relativa desde `views/` (ej: `home/index`)

### La página no carga
- Verifica que estés accediendo a `public/index.php`
- Revisa que PHP esté funcionando
- Comprueba la consola de errores del navegador

## 📚 Recursos adicionales

### Para seguir aprendiendo MVC:
- [Documentación de PHP](https://www.php.net/docs.php)
- [Principios SOLID](https://es.wikipedia.org/wiki/Principios_SOLID)
- [Patrones de diseño](https://refactoring.guru/es/design-patterns)

### Frameworks MVC profesionales:
- [Laravel](https://laravel.com/) - El más popular para PHP
- [Symfony](https://symfony.com/) - Framework robusto y modular
- [CodeIgniter](https://codeigniter.com/) - Simple y ligero

## 👨‍💻 Créditos

Framework MVC educativo desarrollado para fines de aprendizaje.

**Versión**: 1.0.0  
**Autor**: Framework Educativo MVC  
**Licencia**: MIT (libre para uso educativo)

---

¡Feliz aprendizaje! 🎉

Si tienes preguntas o encuentras problemas, revisa el código y los comentarios. Todo está diseñado para ser comprensible para principiantes.# php_mvc_ejemplo

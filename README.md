# Sistema Web de la Posta de Salud Comunitaria

## Descripción
Proyecto académico desarrollado con Laravel y PostgreSQL para la gestión de información de una Posta de Salud Comunitaria.

## Tecnologías utilizadas
- Laravel 13
- PHP 8.3
- PostgreSQL 18
- Composer
- Git y GitHub
- Laragon
- Visual Studio Code

## Requisitos previos
- PHP 8.3 o superior
- Composer
- PostgreSQL
- Git

## Instalación del proyecto

1. Clonar el repositorio:

   ```bash
   git clone https://github.com/Paulo-124/posta-salud.git
   ```

2. Ingresar a la carpeta:

   ```bash
   cd posta-salud
   ```

3. Instalar las dependencias:

   ```bash
   composer install
   ```

4. Crear el archivo de configuración:

   ```bash
   cp .env.example .env
   ```

   En Windows PowerShell también puedes usar:

   ```powershell
   Copy-Item .env.example .env
   ```

5. Generar la clave de Laravel:

   ```bash
   php artisan key:generate
   ```

6. Configurar la conexión a PostgreSQL en el archivo `.env`:

   ```env
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=posta_salud
   DB_USERNAME=postgres
   DB_PASSWORD=
   ```

   Colocar la contraseña correspondiente a la instalación local de PostgreSQL.

7. Ejecutar las migraciones:

   ```bash
   php artisan migrate
   ```

8. Iniciar el servidor:

   ```bash
   php artisan serve
   ```

9. Abrir en el navegador:

   http://127.0.0.1:8000

## Autor
Paulo César Huallpa Romero
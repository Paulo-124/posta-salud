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


## Guía de Laboratorio N.° 02: Base de datos, migraciones, modelos y seeders

### 1. Tablas implementadas

Se implementaron las siguientes tablas en PostgreSQL:

- `users`: usuarios del sistema y sus roles.
- `pacientes`: información personal de los pacientes.
- `personal_medico`: información del personal médico.
- `citas`: programación y estado de las citas médicas.
- `atenciones`: diagnósticos, tratamientos y observaciones médicas.

### 2. Modelos y relaciones Eloquent

Se implementaron los modelos:

- User
- Paciente
- PersonalMedico
- Cita
- Atencion

Relaciones implementadas:

- Un usuario puede estar asociado a un registro de personal médico.
- Un paciente puede tener muchas citas.
- Un personal médico puede tener muchas citas.
- Una cita puede tener una atención.
- Un paciente puede consultar sus atenciones mediante sus citas.

### 3. Factories y Seeders

Se implementaron factories para generar datos ficticios de prueba y seeders para poblar la base de datos.

**Datos generados:**

| Tabla | Registros |
|---|---:|
| Usuarios | 3 |
| Personal médico | 6 |
| Pacientes | 40 |
| Citas | 129 |
| Atenciones | 27 |

### 4. Usuarios de prueba

| Rol | Correo | Contraseña |
|---|---|---|
| Administrador | admin@posta.test | password |
| Personal médico | medico@posta.test | password |
| Recepción | recepcion@posta.test | password |

Nota: Las credenciales son únicamente para pruebas en el entorno de desarrollo. No deben utilizarse en producción.

### 5. Reglas de negocio verificadas

| Código | Regla | Resultado |
|---|---|---|
| RN01 | El DNI de los pacientes debe ser único. | Correcto |
| RF07 | No se puede eliminar un paciente que tenga citas. | Correcto |
| RN05 | Una cita solo puede tener una atención. | Correcto |
| RF12 | Las citas solo admiten estados válidos. | Correcto |

Las pruebas se realizaron mediante Laravel Tinker y las restricciones de PostgreSQL.

### 6. Comando para reconstruir la base de datos y cargar datos de prueba

```bash
php artisan migrate:fresh --seed
```

**Advertencia:** Este comando elimina las tablas y los datos existentes antes de ejecutar nuevamente las migraciones y los seeders.

### 7. Tecnologías utilizadas

- PHP 8.3.30
- Laravel 13.40.0
- PostgreSQL 18.6
- Laragon
- Git y GitHub

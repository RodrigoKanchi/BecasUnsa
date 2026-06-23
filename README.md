# 🚀 Backend Becas Unsa

Este sistema de Laravel funciona como API para <a href="https://github.com/Gabo99x/app-becas-unsa-frontend">Aplicacion Movil Becas Unsa<a>

## 🛠️ Requisitos del Sistema

Asegúrate de tener instalados los siguientes programas en tu entorno local:

- **PHP**: Versión 8.x o superior
- **Composer**: Gestor de dependencias de PHP
- **Node.js**: Versión 20.x o superior (y NPM)
- **MySQL / MariaDB**: Gestor de bases de datos

## ⚙️ Instrucciones de Instalación

Sigue estos pasos para configurar el proyecto en tu entorno local:

1. **Clona el repositorio**
   ```bash
   git clone https://github.com/RodrigoKanchi/BecasUnsa.git
   ```

2. **Accede a la carpeta del proyecto**
   ```bash
   cd tu-repositorio
   ```

3. **Instala las dependencias de PHP**
   ```bash
   composer install
   ```

4. **Instala las dependencias de JavaScript**
   ```bash
   npm install
   ```

5. **Configura el archivo de entorno**
   Copia el archivo de ejemplo y genera la clave de la aplicación:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

6. **Configura tu base de datos**
   Abre el archivo `.env` y actualiza las credenciales de tu base de datos (DB_DATABASE, DB_USERNAME, DB_PASSWORD). Luego, ejecuta las migraciones:
   ```bash
   php artisan migrate --seed
   ```

7. **Compila los assets (CSS/JS)**
   ```bash
   npm run dev
   ```

## 🚀 Despliegue Local

Inicia el servidor local de Laravel y el compilador de assets en terminales separadas:

- **Servidor PHP**: `php artisan serve`
- **Compilador Vite**: `npm run dev`

Accede a tu proyecto en: `http://127.0.0.1:8000`

## 🤝 Contribución

Si deseas contribuir a este proyecto:

1. Haz un Fork del repositorio.
2. Crea una rama para tu nueva función (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza tus cambios y haz commit (`git commit -m 'Agrega nueva funcionalidad'`).
4. Sube los cambios (`git push origin feature/nueva-funcionalidad`).
5. Abre un Pull Request.

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.


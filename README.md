# Boilerplate de PHP 🐘

Este repositorio es tu punto de partida ideal para proyectos basados en PHP. Está configurado con herramientas modernas y servicios que harán de tu desarrollo una experiencia más agradable y profesional.

## 🌟 Características

- **Docker 🐳**: Proporciona un entorno de desarrollo uniforme y sin complicaciones. Equipado con Apache, MariaDB y phpMyAdmin para una experiencia de desarrollo completa.
- **Composer 🎼**: Administrador de dependencias para PHP, facilitando la gestión de librerías y paquetes.
- **phpcs con el estándar PSR12 📏**: Asegura que tu código PHP cumpla con las mejores prácticas definidas en el estándar PSR12.
- **Prettier ✨**: Para formatear archivos PHP (con `@prettier/plugin-php`), JSON, YAML y otros, asegurando un estilo de código consistente.
- **EditorConfig 📝**: Unifica la configuración de estilo (indentación, finales de línea, etc.) entre diferentes editores.
- **GitHub Actions 🤖**: Automatiza los flujos de trabajo:
  - **PSR-12 Lint**: Valida el código PHP en cada push y pull request.
  - **Protect Main Branch**: Bloquea pushes directos no autorizados a `main`.
  - **Require Owner Approval**: Requiere revisión del propietario para cambios críticos.
- **VS Code ⚡**: Incluye configuración recomendada (settings.json) y extensiones recomendadas (extensions.json) para un entorno de desarrollo consistente entre colaboradores.

## 🚀 Configuración inicial

1. **Crea tu repositorio 🛠️**:

  En vez de clonar este repositorio directamente, haz clic en el botón "Use this template" (Usar esta plantilla) en la página principal del repositorio para crear un nuevo repositorio basado en esta plantilla.

2. **Docker 🐳**:

  Es necesario instalar Docker y Docker Compose para establecer y manejar tu entorno de desarrollo. Aunque puedes instalar ambas herramientas por separado, se recomienda optar por Docker Desktop. Esta herramienta unifica Docker y Docker Compose en una única interfaz, facilitando su manejo, ofreciendo una integración más fluida con el sistema operativo y proporcionando herramientas adicionales útiles para la gestión y visualización de tus contenedores.

  Una vez instalado, puedes levantar los servicios (Apache, MariaDB, phpMyAdmin) con:

  ```bash
  docker-compose up
  ```

  Si prefieres correr los servicios en segundo plano, puedes utilizar la opción `-d`:

  ```bash
  docker-compose up -d
  ```

  Esta opción permite que los servicios se ejecuten en modo "detached", liberando la terminal.

3. **Composer 🎼**:

  Una vez dentro del contenedor de PHP, puedes utilizar Composer como lo harías normalmente para gestionar dependencias:

  ```bash
  composer install
  ```

4. **GitHub Actions 🤖**:

  Las acciones ya están preconfiguradas. Encuentra los detalles en `.github/workflows`.

5. **phpcs con el estándar PSR12 📏**:

  Asegúrate de que tu código PHP cumpla con el estándar PSR12. Las GitHub Actions se encargarán de validar automáticamente tu código usando este estándar en cada push o pull request. Es importante siempre adherirse a estas mejores prácticas para mantener la calidad del código.

6. **EditorConfig 📝**

  El plugin EditorConfig para VSCode asegura que todos los desarrolladores del proyecto sigan un estilo de codificación consistente. La configuración se define en el archivo `.editorconfig` en la raíz del proyecto.

7. **Prettier 🎨**

  Prettier es una herramienta de formateo de código que garantiza un estilo de código consistente en todo el proyecto. El plugin Prettier para VSCode ayuda a aplicar estas reglas automáticamente.

8. **Visual Studio Code 💻**:

  Este repositorio incluye un directorio `.vscode/` con:

  - **settings.json**: Configuración para formato automático, validación PHP y aplicación de PSR-12 al guardar.
  - **extensions.json**: Lista de extensiones recomendadas.

  👉 De esta forma, cualquiera que clone el repositorio tendrá el mismo entorno base en VS Code.

## 📢 Reglas de Git

- **Nunca hagas push directamente a `main`**.
  Esta rama está protegida mediante la acción [`protect-main.yml`](.github/workflows/protect-main.yml).

- **Crea siempre una rama aparte** para tus cambios y características.

- **Abre un Pull Request (PR)** para integrar tus cambios.
  Los PRs:
  - Dispararán el linting PSR-12.
  - Requerirán revisión del propietario para cambios críticos (vía [`require-owner-approval.yml`](.github/workflows/require-owner-approval.yml)).

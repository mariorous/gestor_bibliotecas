# 📚 Gestión Centralizada de Bibliotecas
## 📝 Descripción del Proyecto
Este proyecto consiste en una aplicación web de gestión centralizada de una red de bibliotecas. Con esta aplicación se pueden gestionar tanto las bibliotecas como los libros en su inventario, permitiendo realizar acciones como registrar, editar, eliminar y asignar libros a diferentes bibliotecas. Además, cuenta con un buscador que permite localizar los libros en las distintas bibliotecas.

## ✨ Características Principales
- Gestión de bibliotecas: Crear, editar, eliminar y mostrar bibliotecas.
- Gestión de libros: Registrar, editar, eliminar y mostrar libros.
- Asignación de libros: Asignar libros a bibliotecas y gestionarlos desde ambas perspectivas.
- Buscador de libros: Buscar libros por título, autor o ISBN y localizar en qué biblioteca(s) están disponibles.
- Validación de formularios: Validación tanto en el lado del servidor como en el navegador.
- Paginación: Paginación de las listas de bibliotecas y libros para facilitar la navegación.
- Estilos: Maquetación adecuada y validada por W3C para garantizar la accesibilidad y corrección del código HTML.

## 🗂️ Estructura del proyecto
```
/biblioteca-app
│
├── /css
│   └── styles.css              # Archivo de estilos CSS
│
├── /bibliotecas
│   ├── index.php               # Listar bibliotecas
│   ├── create.php              # Crear bibliotecas
│   └── edit.php                # Editar bibliotecas
│
├── /libros
│   ├── index.php               # Listar libros
│   ├── create.php              # Crear libros
│   └── edit.php                # Editar libros
│
├── config.php                  # Configuración de la base de datos
├── index.php                   # Página principal
```

## 🚀 Uso
- Gestión de bibliotecas: Navega a ```/bibliotecas/index.php``` para listar todas las bibliotecas, crear una nueva, o editar las existentes.
- Gestión de libros: Navega a ```/libros/index.php``` para ver la lista de libros, añadir nuevos o modificarlos.
- Buscador: En la página principal o en cualquier sección, usa el buscador para localizar libros por título, autor o ISBN.

## 👥 Autores
Proyecto desarrollado por Mario López y Sandra Borges como parte del módulo MP07 - UF1.

## Instrucciones


- Clonar.
- Hacer Composer Install (con php > 7.1 será suficiente).
- Ajustar el .env al gusto indicándole la base de datos.
- Ejecutar `php artisan migrate --seed` (esto creará las tablas y campos de muestra)


- En database/ están los archivos de las migraciones
- En app/ Están los modelos
- En app/http están los Request, Controllers e Infrastructure/
- En infrastructure/ hay repositorio y service.

# BinaryModel
Proyecto Piloto 

## Pasos para validar desarrollo. 
- composer install
- `composer dump-autoload`
- php artisan migrate:refresh --seed
- en el archivo perfil.js se que encuentra en la siguiente ruta `C:\laragon\www\BinaryModel\resources\js\components\perfil.js` debes cambiar la primera linea con el localhost de tu local o servidor esta actualmente así `const ruta = 'http://binarymodel.test/perfil/registrar';` debes quitar 'http://binarymodel.test' y colocar la nueva ruta 
- Si no compilar el migrate puedes cargar la base de datos de respaldo llamada 'backup_models_15_12_2023.sql'
- si estas en local debes correr esye commando `npm run dev` 
- si vas a subir al servidor no olvides reconfiguarar el archivo perfil.js y correr el comando `npm run build`
 

# BinaryModel
Proyecto Piloto 

## Pasos para validar desarrollo. 
- composer install
- npm i
- se debe configurar la ruta con el dominio que se suba:
    - Paso 1: buscar el archivo -> `\resources\js\components\perfil.js`
    - Paso 2: buscar la variable `ruta` y reemplazar `http://binarymodel.test` por el dominio generado  
- npm run dev
- php artisan migrate:refresh --seed
  
## Funcionalidad Primero Version 
- Login 
- Formulario Dinamico
- Vista Perfil

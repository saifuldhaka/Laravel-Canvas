## Configure database in env file
DB_CONNECTION=mysql

DB_HOST=

DB_PORT=3306

DB_DATABASE=

DB_USERNAME=

DB_PASSWORD=

## Run migration command
php artisan migrate

## Generate APP key
php artisan key:generate

## Run Laravel Canvas
php artisan serve

or

php -S localhost:8000 -t public


## Application Steps
1. Add New Identifier
2. Able to edit or delete existing identifier
3. Saved identifiers will appears with pagination and per page it will be 20 record
4. Click an identifier to create canvas with preloaded identifier objects
5. Drag the objects and put them in desire position
6. Save the canvas
7. Saved canvases will appear with pagination and per page it will be 20 record
8. Click show button to view canvas
9. Click Download as PDF to save in local drive.

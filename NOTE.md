## PENGGUNAAN

1) config file .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database-name
DB_USERNAME=database-user-name
DB_PASSWORD=database-password

2) create model & migration for CRUD App

" php artisan make:model Company -m "

3) open create_companies_table.php file inside LaravelCRUD/database/migrations/ directory. And the update the function up() with following code:

public function up()
{
    Schema::create('companies', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->string('address');
        $table->timestamps();
    });
}

4) run the following command to create tables into database:

"php artisan migrate"

5) Create Routes.
    open web.php file from the routes directory of laravel CRUD app. 
    And update the following routes into the web.php file:

    use App\Http\Controllers\CompanyCRUDController;
    Route::resource('companies', CompanyCRUDController::class);

6) Create Company CRUD Controller By Artisan Command

"php artisan make:controller CompanyCRUDController"

After that, visit at app/Http/controllers


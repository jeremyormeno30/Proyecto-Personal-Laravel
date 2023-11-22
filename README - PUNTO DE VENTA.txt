
---------------------------------------------------------------------------------------------

Instalar XAMPP: https://www.apachefriends.org/es/index.html
a un lado del boton de Descargar aparece la version mas actual disponible, 
pincha eso para descarga la version mas actual

Cuando instales XAMPP verifica lo siguinte:
ve a esta ruta: 
C:\xampp\php
y dentro de esa ruta ubica el archivo: 
php.ini 
y abrelo, para luego verificar que la linea de codigo About php.ini   ;
que es la primera linea de codigo
no tenga un punto y coma al inicio, pero si al final, 
si es que lo tuviera se lo quitas, o sea que se vea asi:
;;;;;;;;;;;;;;;;;;;
 About php.ini   ;
;;;;;;;;;;;;;;;;;;;
luego de eso guardar los cambios y cerrar el archivo

---------------------------------------------------------------------------------------------

Instalar COMPOSER: https://getcomposer.org/download/	
presiona el texto de color que dice: Composer-Setup.exe
ese texto se encuentra al principio de esta pagina web
en el apartado: Windows Installer

---------------------------------------------------------------------------------------------

Abres XAMPP he inicias los servidores de Apache y MySQL 
y abres phpMyAdmin precionando en el boton de Admin de MySQL
y creas una nueva base de datos llamada: cafeteria

Luego abres el explorador de archivos y te situas en 
C:\xampp\htdocs 
estando adentro de esa ruta pegas alli la carpeta donde esta contenido este proyecto 
luego entras a la carpeta con el proyecto en su interior y desde su interior ejecutas CMD
para luego ejecutar lo siguinte:
composer install

Luego abres el proyecto con Visual Studio Code y buscar el archivo:
.env.example 
lo copias y lo pegas alli mismo 
pero esa copia la renombras a 
.env
dentro de .env buscas el apartado de: DB_DATABASE= y le escribes el 
nombre de la base de datos creada en phpMyAdmin: punto_venta 
se deberia ver asi: DB_DATABASE=punto_venta

Luego en el cmd que ejecutaste composer ejecutas lo siguinte:
php artisan key:generate
y veras que en el apartado: APP_KEY= 
se genera una clave encriptada para la coneccion

Luego ejecutas el siguinte comando: 
php artisan migrate
esto es para migrar los datos hacia la base de datos en phpMyAdmin

Luego vas al buscador web y en la url escrbes esto:
http://localhost/PuntoVenta/public/login
y podras visuaizar la pagina web

---------------------------------------------------------------------------------------------

ACCIONES REALIZADAS

cree la migracion productos con el siguiente codigo :
php artisan make:migration create_productos_table

y dentro del proyecto en la ruta database/migrations se creo el siguiente archivo
2023_10_29_214303_create_products_table.php

Y agregue el codigo correspondiente

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('barcode'); // codigo de barra
            $table->string('name');     // nombre o descripcion
            $table->integer('stocks');  // cantidad existente
            $table->string('price');    // precio del producto
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

----------------------------------------------------------

cree el modelo productos con el siguiente codigo :
php artisan make:model Products

y dentro del proyecto en la ruta app/models se creo el siguiente archivo
Product.php

Y agregue el codigo correspondiente

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['category_id', 'bardode', 'name', 'stocks', 'price'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}

----------------------------------------------------------

cree el controlador productos con el siguiente codigo
php artisan make:controller ProductsController

y dentro del proyecto en la ruta app/http/Controllers se creo el siguiente archivo
ProductController.php

Y agregue el codigo correspondiente

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'barcode' => 'required|unique:products,barcode',
            'name' => 'required',
            'stocks' => 'required',
            'price' => 'required'
        ]);
        Product::create([
            'category_id' => $request->category_id,
            'barcode' => $request->barcode,
            'name' => $request->name,
            'stocks' => $request->stocks,
            'price' => $request->price
        ]);
        return redirect()->route('home');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('home');
    }
}

----------------------------------------------------------

en el archivo de rutas ubicado en routes/web.php
agregue una nueva ruta

Route::post('/products', [ProductsController::class, 'store'])->name('products.store')->middleware('auth');

Route::delete('/products/{id}', [ProductsController::class, 'delete'])->name('products.delete')->middleware('auth');

Route::get('/products', 'ProductsController@index');

----------------------------------------------------------


abarrotes
lacteos
congelados
panaderia
frutas y verduras
mascotas
bebidas y licores
fiambreria
higiene personal
aseo  



















































tengo este código de laravel


|

| Composer provides a convenient, automatically generated class loader for

| this application. We just need to utilize it! We'll simply require it

| into the script here so we don't need to manually load our classes.

|

*/



require __DIR__.'/../vendor/autoload.php';



/*

|--------------------------------------------------------------------------

| Run The Application

|--------------------------------------------------------------------------

|

| Once we have the application, we can handle the incoming request using

| the application's HTTP kernel. Then, we will send the response back

| to this client's browser, allowing them to enjoy our application.

|

*/



$app = require_once __DIR__.'/../bootstrap/app.php';



$kernel = $app->make(Kernel::class);



$response = $kernel->handle(

    $request = Request::capture()

)->send();



$kernel->terminate($request, $response);

 el cual me arroga un error

Target class [ProductsController] does not exist.

¿COMO LO ARREGLO?
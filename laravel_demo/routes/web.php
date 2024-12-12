<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController; //เวลามี controller ใหม่ ๆ มาต้อง use เสมอ
use App\Http\Controllers\BackOfficeController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
    $title = 'About';
    return view('about', compact('title'));
});

Route::get('/contact', function(){
    $name = 'Contact';
    $age = 20;
    $salary = 1000;

    return view('contact', compact('name','age','salary'));
});

Route::get('/profile', function(){
    return view('profile',['name' =>'Nueng','age'=>20]);
});

Route::get('/params/{name}/{age}/{salary}', function ($name, $age, $salary){
    return view('params', compact('name', 'age', 'salary'));
});

//Post
Route::get('/post', function(){
    return view('post');
});

Route::post('/post', function (Request $request){
    $name = $request->name;
    return json_encode (['name'=> $name]);
});

Route::get('/home', function(){
    return view('home');
});

Route::get('/response', function (){
    return response()->json(['name' => 'Tavon']);
});

Route::get('/products', function(){
    $products = [
        ['id' =>1, 'name' => 'Product 1', 'price'=>100],
        ['id' =>2, 'name' => 'Product 2', 'price'=>200],
        ['id' =>3, 'name' => 'Product 3', 'price'=>300],
    ];
    return response()->json($products);
});

Route::get('/response-type', function(){
    //401 = unthorized
    //403 = forbidden
    //404 = not found ใส่ path ไม่ถูก
    //500 = internal server error  server error
    //200 = ok
    //201 = created
    //202 = accepted
    //204 = no content
    return response('Untorized', 401);
});

Route::get('/rediect', function(){
    return redirect('/target');
});

Route::get('/target', function(){
   return 'Target'; 
});
 
// Route with Controller Customer
$customerController = CustomerController::class;

Route::get('/customers', [$customerController, 'list']); //get(route path) , ชื่อตัวแปร, ชื่อ function ที่อยู่่ใน controller
Route::get('/customers/{id}', [$customerController, 'detail']); // ถ้าอันไหนใน controller รับ id หรือ parameter ต้องระบุด้วย
Route::get('/customers', [$customerController, 'create']); //ถ้าเป็นรับค่าา request object ไม่ต้องส่งค่ามันจะรู้เอง post กับ push ว่าไม่ต้องส่งค่า
Route::get('/customers{id}', [$customerController, 'update']);
Route::get('/customers{id}', [$customerController, 'delete']); //ถ้าเจอ error target class not found ให้ use controller ที่ข้างบน

// Route with Controller User
Route::get('/users/list', [UserController::class, 'list']);
Route::get('/users/form', [UserController::class, 'form']);
Route::post('/users', [UserController::class, 'create']);
Route::get('/users/{id}', [UserController::class, 'edit']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/remove/{id}', [UserController::class, 'remove']);

//User Sign in
Route::get('/user/signIn', [UserController::class, 'signIn']);
Route::post('/user/signInProcess', [UserController::class, 'signInProcess']);
Route::get('/user/signOut', [UserController::class, 'signOut'])->Middleware(EnsureTokenIsValid::class);
Route::get('/user/info', [UserController::class, 'info'])->Middleware(EnsureTokenIsValid::class);

//Back office
Route::get('/backoffice', [BackOfficeController::class, 'index'])->Middleware(EnsureTokenIsValid::class);

// Route with Product
Route::get('/product/list', [ProductController::class, 'list']);
Route::get('/product/form', [ProductController::class, 'form']);
Route::post('/product', [ProductController::class, 'save']);
Route::get('/product/{id}', [ProductController::class, 'edit']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::get('/product/remove/{id}', [ProductController::class, 'remove']);

// 19/11/2024
Route::post('/product/search', [ProductController::class, 'search']);
Route::get('/product-sort', [ProductController::class, 'sort']);
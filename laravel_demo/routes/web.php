<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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


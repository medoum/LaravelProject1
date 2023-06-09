<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');


Route::get('/blog', function(){
    return [
        'link' => \route('blog.show', ['slug' => 'article', 'id' => 13]),
    ];
})->name('blog.index');

Route::get('/blog/{slug}-{id}', function(Request $request, string $slug, string $id){
    return [
        "slug" => $slug,
        'id' => $id,
        'name' => $request->input('name'),
    ];
})->where([
    'id' => '[0-9]+',
    'slug' => '[a-z0-9\-]+'
])->name('show');

});
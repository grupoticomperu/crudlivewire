<?php
//use App\Http\Controllers\Dashboard\UserController;
use App\Http\Livewire\UserSave;
use App\Http\Livewire\UsersList;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/inventarios', function () {
    return view('inventarios');
})->name('inventarios');


Route::group(['middleware'=>['auth:sanctum','verified'],'prefix'=>'dashboard'], function(){
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['namespace'=>'App\Http\Controllers\Dashboard'], function(){
        Route::resource('user', UserController::class);
    }); 
    
   // Route::resource('user', UserController::class);

    /*Route::get('cuser', function(){
        return view('dashboard.users.cindex');
    });
    esta forma es recomendable cundo la vista tiene varios componentes
    */
    Route::get('cuser', UsersList::class)->name('user.list'); 
    //de esta forma tenemos que adicionarle los slots con nombre de layout
    //podemos asignarle otro layout
    //  return view('livewire.show-posts')
    //->layout('layouts.base');
    Route::get('save-user', UserSave::class)->name('user.create');    
    Route::get('update-user/{id}', UserSave::class)->name('user.edit'); 
}); 

<?php


//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    $name = "Mahmoud AlRubai";
    return view('about', compact('name'));
});


Route::post('store', function (Request $request) {
    $name = $request->myname;
    return view('about', compact('name'));
});

//************** */

Route::get('tasks', function () {
    $tasks = [
        'first-task' => 'task 1',
        'second-task' => 'task 2',
        'third-task' => 'task 3'
    ];

    return view('tasks', compact('tasks'));
});

Route::get('show/{id}', function ($id) {
    $tasks = [
        'first-task' => 'task 1',
        'second-task' => 'task 2',
        'third-task' => 'task 3'
    ];
    $task = $tasks[$id];

    return view('show', compact('task'));
});

//************** */

Route::get('tasks',function(){

    $tasks= DB::table('tasks')->get();
    //dd($task);


    return view('tasks',compact('tasks'));
});

Route::get('tasks/show/{id}' , function($id){

    $task= DB::table('tasks')->find($id);
    //dd($task);

    return view('show',compact('task'));

});

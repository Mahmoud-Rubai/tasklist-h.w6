<?php


//use GuzzleHttp\Psr7\Request;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    $name = "mahmoed alrabaie";
    return view('about', compact('name'));
});


Route::post('store', function (Request $request) {
    $name = $request->myname;
    return view('about', compact('name'));
});

Route::get('tasks',function(){

    $tasks= DB::table('tasks')->get();

    return view('tasks',compact('tasks'));
});

Route::get('tasks/show/{id}' , function($id){

    $task= DB::table('tasks')->find($id);
    //dd($task);
    return view('show',compact('task'));

});

Route::get('todo', function () {

    // $tasks =DB::table('tasks')->get();
    $tasks= Task::all();


    return view('todo', compact('tasks'));
});

Route::post('store',function(Request $request){

    // DB::table('tasks')->insert([
    //     'title'=> $request-> title
    // ]);

    $task = new Task;
    $task-> title = $request-> title;
    $task -> save();

    return redirect()-> back();

  //  ******************************

});
Route::post('del/{id}', function (Request $d) {
    $tasks = DB::table('tasks')->get();
    $ti = 0;
    foreach ($tasks as $t => $task) {
        $ti = $task->title;
    }
    DB::table('tasks')->where('title', '=', $ti)->delete();
    // $tit = $d->tit;
    // DB::table('tasks')->where('title', $tit)->delete();
    return redirect()->back();
});




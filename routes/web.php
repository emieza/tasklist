<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Show Task Dashboard
 */
Route::get('/', function () {

    $tasks = Task::orderBy('created_at', 'asc')->get();
    $categories = Category::all();

    return view('tasks', [
        'tasks' => $tasks,
        'cats' => $categories,
    ]);

});



/**
 * Add New Task
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:70',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    if( $request->cat_id!=0 )
        $task->category_id = $request->cat_id;
    $task->save();

    return redirect('/');

});


/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task) {
    //
    //$task = Task::findOrFail($task);
    $task->delete();

    return redirect('/');
});


<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    /**
     * Task Respository
     */
	protected $tasks;

    /**
     * Inject the Dependency & check if the user is logged in
     *
     * @param      \App\Repositories\TaskRepository  $tasks  The tasks
     */
    public function __construct(TaskRepository $tasks)
    {    	
    	$this->middleware('auth');

    	$this->tasks = $tasks;
    }


    /**
     * List all tasks
     *
     * @param      \Illuminate\Http\Request  $request  The request
     *
     * @return     View                    The list with all tasks
     */
    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);   	
    }


    /**
     * Save the task in DB
     *
     * @param      \Illuminate\Http\Request  $request  The request
     *
     * @return     Redirect                    Point the browser to task list
     */
    public function store(Request $request)
    {        
    	$this->validate($request, [
    		'name' => 'required|max:255',
    	]);

    	$task = $request->user()->tasks()->create([
        	'name' => strip_tags($request->name),
    	]);        

    	return json_encode($task);
    }


    /**
     * Delete the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('delete', $task);
        
        $task = $task->delete();

        return json_encode($task);
    }    

}

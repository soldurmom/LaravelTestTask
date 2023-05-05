<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function show(Request $request){
        $users = User::all();

        if($request->get('user_id'))
            $tasks = Task::where('user_id', $request->get('user_id'))->get();
        else
            $tasks = Task::all();

        return view('content.catalog', ['users' => $users, 'tasks' => $tasks]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index(){
        $todos = Todo::all();
        return view('welcome',[
            'todos'=>$todos
        ]);
    }

    public function store(){
       
       $data= request()->validate([
            'title'=> 'required',
            'description'=>'nullable'

        ]);
        Todo::create($data);
        return redirect('/');
    }
    
    public function update(Todo $todo){
        $todo->update(['completed'=>true]);
        return redirect('/');
        }

        public function destroy(Todo $todo){
            $todo->delete();
        }
}

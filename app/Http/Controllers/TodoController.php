<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index()
    {
        $response = todo::all();
        return view('index', ['response' => $response]);
    }

    public function create(TodoRequest $request)
    {
        if($request->has('add')){
            $form = $request->all();
            todo::create($form);
            return redirect('/');

        }elseif($request->has('update')){
            $form = $request->all();
            unset($form['_token']);
            todo::find($form['id'])->update($form);
            return redirect('/');

        }elseif($request->has('delete')){}
            $form = $request->all();
            todo::find($form['id'])->delete($form);
            return redirect('/');
    }

}

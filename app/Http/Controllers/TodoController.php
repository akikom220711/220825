<?php

namespace App\Http\Controllers;

use App\Models\todo;
use App\Http\Requests\TodoRequest;
use App\Models\Tag;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $response = todo::where('user_id', '=', $user['id'])->get();
        $select = Tag::all();
        $param = ['response' => $response, 'user' => $user, 'select' => $select];
        return view('home', $param);
    }

    public function create(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        todo::create($form);
        return redirect('/home');
    }

    public function edit(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        todo::find($form['id'])->update($form);
        return redirect('/home');
    }

    public function delete(Request $request)
    {
        $form = $request->all();
        todo::find($form['id'])->delete($form);
        return redirect('/home');
    }

    public function search()
    {
        $user = Auth::user();
        $select = Tag::all();
        $response = todo::all();

        $results = null;
        $param_search = ['user' => $user, 'select' => $select, 'response' => $response, 'results' => $results];
        return view('search', $param_search);
    }

    public function result(Request $request)
    {
        $user = Auth::user();
        $select = Tag::all();

        $form = $request->all();

        if ($form['tag_id'] == null && $form['contents'] == null)
        {
            $results = todo::where('user_id', '=', $form['user_id'])->get();
        }elseif ($form['tag_id'] != null && $form['contents'] == null){
            $results =  todo::where('user_id', '=', $form['user_id'])
                ->where('tag_id', '=', $form['tag_id'])
                ->get();
        }elseif ($form['tag_id'] == null && $form['contents'] != null){
            $contents_word = $form['contents'];
            $results =  todo::where('user_id', '=', $form['user_id'])
                ->where('contents', 'LIKE', "%$contents_word%")
                ->get();
        }else{
            $contents_word = $form['contents'];
            $results =  todo::where('user_id', '=', $form['user_id'])
                ->where('tag_id', '=', $form['tag_id'])
                ->where('contents', 'LIKE', "%$contents_word%")
                ->get();
        }

        $param_search = ['user' => $user, 'select' => $select, 'results' => $results];
        return view('search', $param_search);
    }

}

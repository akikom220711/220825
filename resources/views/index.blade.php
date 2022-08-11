@extends('layout.default')

@section('title', 'COACHTECH')

@section('content')

<h3>ToDo List</h3>

@if (count($errors) > 0)
  <ul>
    <li>
      {{$errors->first('contents')}} 
    </li>
  </ul>
@endif

<form class="add_form", action="/", method="POST">
  @csrf
  <input class="add_textbox", type="text", name="contents">
  <input class="add_button", type="submit", name="add" value="追加">
</form>

<table>
  <tr>
    <th>作成日</th>
    <th>タスク名</th>
    <th></th>
    <th>更新</th>
    <th>削除</th>
  </tr>
  @foreach($response as $data)
  <tr>
    <td>{{$data->updated_at}}</td>
    <form action="/", method="POST">
      @csrf
      <td><input class="todo_contents", type="text", name="contents", value="{{$data->contents}}"></td>
      <td><input type="hidden", name="id", value="{{$data->id}}"></td>
      <td><input class="update_button", type="submit", name="update", value="更新"></td>
      <td><input class="delete_button", type="submit", name="delete", value="削除"></td>
    </form>
  </tr>
  @endforeach
</table>
@endsection
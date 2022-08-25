@extends('layout.default')

@section('title', 'COACHTECH')

@section('content')

<div class="title">
<h3>ToDo List</h3>

@if (Auth::check())
  <ul >
    <li class="login_list"><p>「{{$user -> name}}」でログイン中</p></li>
    <li class="login_list">
      <form action="/logout", method="GET">
        @csrf
        <input class="logout_button"  type="submit", value="ログアウト">
      </form>
    </li>
  </ul>
</div>

  <form action="/search", method="GET">
    @csrf
    <input class="search_button", type="submit", value="タスク検索">
  </form>

@if (count($errors) > 0)
  <ul>
    <li>
      {{$errors->first('contents')}} 
    </li>
  </ul>
@endif

<form class="add_form", action="{{route('home', ['user_id' => $user->id])}}", method="POST">
  @csrf
  <input class="add_textbox", type="text", name="contents">
  <select class="add_tag" name="tag_id" size="1">
    @foreach ($select as $list)
      <option value="{{$list -> id}}">{{$list -> tags}}</option>
    @endforeach
  </select>
  <input class="add_button", type="submit", name="add" value="追加">
</form>

<table>
  <tr>
    <th>作成日</th>
    <th>タスク名</th>
    <th>タグ</th>
    <th></th>
    <th>更新</th>
    <th></th>
    <th>削除</th>
  </tr>

  @if ($response != null)
    @foreach($response as $data)
      @if ($user -> id == $data -> user_id)
        <tr>
          <td>{{$data->updated_at}}</td>
          <form action="/edit", method="POST">
            @csrf
            <td><input class="todo_contents", type="text", name="contents", value="{{$data->contents}}"></td>
            <td><select class="table_tag" name="tag_id">
                  @foreach ($select as $list)
                    @if ($data -> tag_id == $list -> id)
                      <option value="{{$list -> id}}" selected>{{$list -> tags}}</option>
                    @else
                      <option value="{{$list -> id}}">{{$list -> tags}}</option>
                    @endif
                  @endforeach
            </select></td>
            <td><input type="hidden", name="id", value="{{$data->id}}"></td>
            <td><input class="update_button", type="submit", name="update", value="更新"></td>
          </form>
          <form action="/delete", method="POST">
            @csrf
            <td><input type="hidden", name="id", value="{{$data->id}}"></td>
            <td><input class="delete_button", type="submit", name="delete", value="削除"></td>
          </form>
        </tr>
      @endif
    @endforeach
  @endif

</table>
@endif
@endsection
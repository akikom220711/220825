@extends('layout.default')
<!--<style></style>-->
@section('title', 'COACHTECH')

@section('content')
<h3>ToDo List</h3>
<form action="/", method="POST">
  @csrf
  <input type="text", name="new">
  <input type="submit", value="追加">
</form>

<table>
  <tr>
    <th>作成日</th>
    <th>タスク名</th>
    <th>更新</th>
    <th>削除</th>
  </tr>
  @foreach($response as $data)
  <tr>
    <td>{{$data->updated_at}}</td>
    <form action="/", method="POST">
      @csrf
      <td><input type="text", name="old", value="{{$data->contents}}"></td>
      <td><input type="submit", value="更新"></td>
      <td><input type="submit", value="削除"></td>
    </form>
  </tr>
  @endforeach
</table>
@endsection
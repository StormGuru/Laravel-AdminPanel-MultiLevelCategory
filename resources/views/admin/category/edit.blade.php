@extends('layouts.admin')

@section('content')


<h1> Редактирование категории</h1>

<form method="post" action="{{route('categories.update', $category1->id)}}">
    @csrf
    @method('patch')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Название категории</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$category1->name}}">
  </div>
  <button type="submit" class="btn btn-primary">Сохранить</button>
</form>

@endsection
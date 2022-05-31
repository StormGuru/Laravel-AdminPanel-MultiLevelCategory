@extends('layouts.admin')
@section('content')
<h1> Добавление категории</h1>
<form method="post" action="{{route('categories.store')}}">
  @csrf
  <div class="mb-3">
    @error('name')
      <p class="text-danger">{{$message}}</p>
    @enderror
    <label for="exampleInputEmail1" class="form-label">Название категории</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('name')}}">
  </div>
  <button type="submit" class="btn btn-primary">Добавить</button>
</form>
@endsection

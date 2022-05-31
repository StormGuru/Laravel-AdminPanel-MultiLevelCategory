@extends('layouts.admin')
@section('content')
<h1> Добавление подкатегории</h1>
<form method="post" action="{{route('sub_categories.store')}}">
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Название подкатегории</label>
    <input type="text" name="sub_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
 <div>
   <p>Родительская категория</p>
   <select class="form-select mb-3" aria-label="Default select example" name="category_id">
    @foreach($ctgs as $ctg)
   <option value="{{$ctg->id}}">{{$ctg->name}}</option>
    @endforeach
   </select>
</div>
  <button type="submit" class="btn btn-primary">Добавить</button>
</form>
@endsection

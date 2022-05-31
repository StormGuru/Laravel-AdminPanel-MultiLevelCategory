@extends('layouts.admin')
@section('content')
<h1> Редактирование подкатегории</h1>
<form method="post" action="{{route('sub_categories.update', $sub_category->id)}}">
    @csrf
    @method('patch')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Название подкатегории</label>
    <input type="text" name="sub_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$sub_category->sub_name}}">
  </div>
 <div>
   <p>Родительская категория</p>
   <select class="form-select mb-3" aria-label="Default select example" name="category_id">
    @foreach($ctgs as $ctg)
   <option value="{{$ctg->id}}">{{$ctg->name}}</option>
    @endforeach
   </select>
</div>
  <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
@endsection

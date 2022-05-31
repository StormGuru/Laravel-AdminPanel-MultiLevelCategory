@extends('layouts.admin')
@section('content')
<h1> Добавление подподкатегории</h1>
<form method="post" action="{{route('sub_sub_categories.store')}}">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Название подподкатегории</label>
    <input type="text" name="sub_sub_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
 <div>
   <p>Родительская категория</p>
   <select class="form-select mb-3" aria-label="Default select example" name="sub_category_id">
    @foreach($sub_ctgs as $sub_ctg)
   <option value="{{$sub_ctg->id}}">{{$sub_ctg->sub_name}}</option>
    @endforeach
   </select>
</div>
  <button type="submit" class="btn btn-primary">Добавить</button>
</form>
@endsection

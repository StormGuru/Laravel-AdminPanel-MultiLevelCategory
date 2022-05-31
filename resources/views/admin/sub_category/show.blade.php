@extends('layouts.admin')
@section('content')
<a href="{{route('sub_sub_categories.create')}}"><button type="button" class="btn btn-success mb-3">Добавить подподкатегорию</button></a>
<h1 class="mb-3">Подкатегория {{$sub_category->sub_name}} </h1>
@foreach($sub_sub_ctgs as $sub_sub_ctg)
<table class="table table-dark">
  <tbody>
    <tr>
      <th scope="row">{{$sub_sub_ctg->id}}</th>
      <td><a href="">{{$sub_sub_ctg->sub_sub_name}}</a></td>
      <th scope="col"><a href="{{route('sub_sub_categories.edit', $sub_sub_ctg->id )}}"><button type="button" class="btn btn-primary">Редактировать</button></a></th>
      <th scope="col"><a class="btn btn-danger" href="{{route('sub_sub_categories.destroy', $sub_sub_ctg->id)}}">
        Удалить</a></th>
    </tr>
  </tbody>
</table>
@endforeach
@endsection

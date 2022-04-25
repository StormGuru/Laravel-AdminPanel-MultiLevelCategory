<!-- <div>{{$category1->id}}</div>
<div>{{$category1->name}}</div>
hhhhhhhhhhhhhh -->
@extends('layouts.admin')

@section('content')


<a href="{{route('sub_categories.create')}}"><button type="button" class="btn btn-success mb-3">Добавить подкатегорию</button></a>

<h1 class="mb-3">Категория {{$category1->name}} </h1>
@foreach($sub_ctgs as $sub_ctg)
<table class="table table-dark">
  <tbody>
    <tr>
      <th scope="row">{{$sub_ctg->id}}</th>
      <td><a href="{{route('sub_categories.show', $sub_ctg->id)}}">{{$sub_ctg->sub_name}}</a></td>
      <th scope="col"><a href="{{route('sub_categories.edit', $sub_ctg->id)}}"><button type="button" class="btn btn-primary">Редактировать</button></a></th>
      <th scope="col"><a class="btn btn-danger" href="{{route('sub_categories.destroy', $sub_ctg->id)}}">
        Удалить</a></th>
    </tr>
  </tbody>
</table>
@endforeach

@endsection
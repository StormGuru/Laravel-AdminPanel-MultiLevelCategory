@extends('layouts.admin')
@section('content')
<a href="{{route('categories.create')}}"><button type="button" class="btn btn-success mb-3">Добавить категорию</button></a>
<a href="{{route('sub_categories.create')}}"><button type="button" class="btn btn-success mb-3">Добавить подкатегорию</button></a>
<a href="{{route('sub_sub_categories.create')}}"><button type="button" class="btn btn-success mb-3">Добавить подподкатегорию</button></a>
<h1 class="mb-3">Категории</h1>
@foreach($categories as $category)
<table class="table table-dark">
  <tbody>
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>
        <h2>{{$category->name}}</h2>
        <ul>
         @foreach($category->sub_ctgs as $s_category)
          <li><h4>{{$s_category->sub_name}}
             <a href="{{route('sub_categories.edit', $s_category->id)}}"><button type="button" class="btn btn-primary">Редактировать</button></a>
             <a class="btn btn-danger" href="{{route('sub_categories.destroy', $s_category->id)}}">
        Удалить</a>
            </h4>
          </li>
               <ul>
                 @foreach($s_category->sub_sub_ctgs as $sub_sub_ctg)
                   <li>{{ $sub_sub_ctg->sub_sub_name  }}      
                    <a href="{{route('sub_sub_categories.edit', $sub_sub_ctg->id)}}">Редактировать</a>
                    <a class="text-danger" href="{{route('sub_sub_categories.destroy', $sub_sub_ctg->id)}}">Удалить</a>
                   </li>
                @endforeach
               </ul>
          @endforeach
        </ul>
      </td>
      <th scope="col"><a href="{{route('categories.edit', $category->id)}}"><button type="button" class="btn btn-primary">Редактировать</button></a></th>
      <th scope="col"><a class="btn btn-danger" href="{{route('categories.destroy', $category->id)}}">
        Удалить</a></th>
    </tr>
  </tbody>
</table>
@endforeach
@endsection

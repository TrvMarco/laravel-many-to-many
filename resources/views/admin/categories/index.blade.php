@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>Lista delle categorie</h1>
        </div>
        <div class="col-6 d-flex justify-content-end align-self-start">
            <a href="{{ route('admin.categories.create')}}" type="button" class="btn btn-success">Crea categoria</a>
        </div>
    </div>
</div>
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nome</th>
            <th scope="col">Slug</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
          <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td>{{$category->slug}}</td>
            <td class="d-flex">
                <a href="{{route('admin.categories.edit', $category->id)}}" type="button" class="btn btn-warning btn-sm mr-2">Modifica</a>
                <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection
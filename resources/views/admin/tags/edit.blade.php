@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica una tag</h1>
    </div>
    <hr>
    <div class="container">
        <form action="{{route('admin.tags.update', $tag->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Modifica tag:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $tag->name)}}" >
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
               </div>
               <button type="submit" class="btn btn-warning">Modifica</button>
        </form>
    </div>
@endsection
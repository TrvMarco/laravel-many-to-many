@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea un nuovo tag</h1>
    </div>
    <hr>
    <div class="container">
        <form action="{{route('admin.tags.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="name">Aggiungi tag</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" >
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
               </div>
               <button type="submit" class="btn btn-primary">Crea tag</button>
        </form>
    </div>
@endsection
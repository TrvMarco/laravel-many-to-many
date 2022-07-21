@extends('layouts.app');

@section('content')
    <div class="container">
        <h1>Crea un post</h1>
    </div>
    <div class="container">
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="title">Titolo</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}" >
              @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
                <label for="content">Contenuto:</label>
                <textarea class="form-control  @error('content') is-invalid @enderror" name="content" id="content" cols="30" rows="5" name="content">{{old('content')}}</textarea>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
              <label for="category">Categoria post:</label>
              <select class="form-control @error('category_id') is-invalid @enderror" id="category" name="category_id">
                    <option value="">Seleziona</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
              </select>
              @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            @foreach ($tags as $tag)
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="{{$tag->slug}}" value="{{$tag->id}}" name="tags[]" {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}}>
              <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
            </div>
            @endforeach
            <hr>

            <div class="form-check mb-3">
              <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published" {{old('published') ? 'checked' : ''}}>
              <label class="form-check-label" for="published">Pubblica il post</label>
              @error('published')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Crea Post</button>
        </form>
    </div>
@endsection
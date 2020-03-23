@extends('layouts.master')

@section('title', 'New Article')

@section('content')
    <h1 class="d-inline">Create New Article</h1>

    <form action="{{action('ArticleController@store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group mt-4">
            <label for="articleName">Article name</label>
            <input name="name" type="text" class="form-control" id="articleName" placeholder="Article name">
            @if($errors->has('name'))
                <div class="alert alert-danger" role="alert">
                    {{$errors->get('name')[0]}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="articleBody">Article body</label>
            <textarea name="body" class="form-control" id="articleBody" placeholder="Article Body" rows="4"></textarea>
            @if($errors->has('body'))
                <div class="alert alert-danger" role="alert">
                    {{$errors->get('body')[0]}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $id => $category)
                    <option value="{{$id}}">{{$category}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tag">Tag</label>
            <select multiple class="form-control" id="tag" name="tags[]">
                @foreach($tags as $id => $tag)
                    <option value="{{$id}}">{{$tag}}</option>
                @endforeach
            </select>
        </div>
        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="customFile" name="image" accept="image/*">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <div class="float-right">
            <a class="btn btn-danger text-light" href="{{route('articles.index')}}">[x] Delete</a>
            <button type="submit" class="btn btn-primary">[+] Create</button>
        </div>

    </form>
@endsection

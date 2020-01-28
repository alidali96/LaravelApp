@extends('layouts.master')

@section('title', 'New Article')

@section('content')
    <h1 class="d-inline">Create New Article</h1>

    <form>
        <div class="form-group mt-4">
            <label for="articleName">Article name</label>
            <input name="articleName" type="text" class="form-control" id="articleName" aria-describedby="articleName"
                   placeholder="Article name">
        </div>
        <div class="form-group">
            <label for="articleBody">Article body</label>
            <textarea name="articleBody" class="form-control" id="articleBody" rows="4"></textarea>
        </div>
        <div class="float-right">
            <a class="btn btn-danger text-light" href="{{route('articles.index')}}">[x] Delete</a>
            <button type="submit" class="btn btn-primary">[+] Create</button>
        </div>
    </form>
@endsection

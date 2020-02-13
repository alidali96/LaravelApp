@extends('layouts.master')

@section('title', 'Create Category')

@section('content')
    <h1 class="d-inline">Create New Category</h1>

    <form action="{{action('CategoryController@store')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group mt-4">
            <label for="categoryName">Category</label>
            <input name="name" type="text" class="form-control" id="categoryName" placeholder="Category">
            @if($errors->has('name'))
                <div class="alert alert-danger" role="alert">
                    {{$errors->get('name')[0]}}
                </div>
            @endif
        </div>
        <div class="form-group mt-4">
            <label for="categoryDescription">Description</label>
            <input name="description" type="text" class="form-control" id="categoryDescription"
                   placeholder="About this category...">
            @if($errors->has('description'))
                <div class="alert alert-danger" role="alert">
                    {{$errors->get('description')[0]}}
                </div>
            @endif
        </div>
        <div class="float-right">
            <a class="btn btn-danger text-light" href="{{route('categories.index')}}">[x] Delete</a>
            <button type="submit" class="btn btn-primary">[+] Create</button>
        </div>
    </form>


@endsection

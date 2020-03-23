@extends('layouts.master')

@section('title', 'Categories')

@section('content')
    <h1 class="d-inline">Categories</h1>
    <a href="{{route('categories.create')}}" class="btn btn-primary float-right m-1">[+] Add New</a>
    <div class="clearfix mb-3"></div>

    @foreach($categories as $category)
        <ul class="list-group" style="font-size: 1.2em">
{{--            <li class="list-group-item  bg-dark text-light">ID: {{$category->id}}</li>--}}
            <li class="list-group-item bg-dark text-light"><a class="text-danger text-decoration-none" style="font-size: 1.2em"
                    href="{{action('CategoryController@show', $category->id)}}">{{$category->name}}</a></li>
            <li class="list-group-item">{{$category->description}}</li>
            <li class="list-group-item">
                <a class="btn btn-success float-right" href="{{route('categories.show', $category->id)}}">Continue</a>
                <a class="btn btn-primary float-right mr-1" href="{{route('categories.edit', $category->id)}}">Edit</a>
                <form action="{{action('CategoryController@destroy', $category->id)}}" method="post">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <input type="submit" class="btn btn-danger float-right mr-1" href="{{route('categories.destroy', $category->id)}}" value="Delete" />
                </form>
            </li>
        </ul><br/>
    @endforeach
    {{$categories->links()}}
@endsection

@extends('layouts.master')

@section('title', "$category->name")

@section('content')
    <h2>{{$category->name}}</h2>
    <div class="card mt-4" style="font-size: 1.1em">
        <h3 class="card-header badge-dark">{{$category->name}}</h3>
        <p class="card-body badge-light">{{$category->description}}</p>
{{--        <small class="card-footer badge-secondary">Author: {{$article->author_id}} Created on: {{date("d-m-Y",strtotime($article->created_at))}}</small>--}}
    </div>
    {{--    <a class="btn btn-primary col-12" href="{{route('articles.index')}}">Back</a>--}}
    <a class="btn btn-primary mt-2 col-1 float-right" href="{{route('categories.index')}}">Back</a>
@endsection

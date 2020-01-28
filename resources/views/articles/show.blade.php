@extends('layouts.master')

@section('title', "$article->name")

@section('content')
    <h2>Article #{{$article->id}}</h2>
    <div class="list-group-item" style="font-size: 1.1em">
        <h3>Name: {{$article->name}}</h3>
        <p>Body: {{$article->body}}</p>
        <small>Author: {{$article->author_id}}</small>
    </div>
{{--    <a class="btn btn-primary col-12" href="{{route('articles.index')}}">Back</a>--}}
    <a class="btn btn-primary mt-2 col-1 float-right" href="{{route('articles.index')}}">Back</a>
@endsection

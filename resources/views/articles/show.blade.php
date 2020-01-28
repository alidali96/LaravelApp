@extends('layouts.master')

@section('title', "$article->name")

@section('content')
    <h2>Article #{{$article->id}}</h2>
    <div class="card" style="font-size: 1.1em">
        <h3 class="card-header badge-dark">Name: {{$article->name}}</h3>
        <p class="card-body badge-light">Body: {{$article->body}}</p>
        <small class="card-footer badge-secondary">Author: {{$article->author_id}}</small>
    </div>
{{--    <a class="btn btn-primary col-12" href="{{route('articles.index')}}">Back</a>--}}
    <a class="btn btn-primary mt-2 col-1 float-right" href="{{route('articles.index')}}">Back</a>
@endsection

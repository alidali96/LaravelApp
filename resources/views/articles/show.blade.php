@extends('layouts.master')

@section('title', "$article->name")

@section('content')
    <h2>Article #{{$article->id}}</h2>
    <div class="card" style="font-size: 1.1em">
        <h3 class="card-header badge-dark">Name: {{$article->name}}</h3>
        <p class="card-body badge-light">Body: {{$article->body}}</p>
        <small class="card-footer badge-secondary">Tags:
            @foreach($article->tags as $tag)
                <small class="tag">{{$tag->name}}</small>
            @endforeach
            <br>
            Author: {{$article->author_id}} Created on: {{date("d-m-Y",strtotime($article->created_at))}}
        </small>
    </div>

    {{--    <a class="btn btn-primary col-12" href="{{route('articles.index')}}">Back</a>--}}
    {{--    <a class="btn btn-primary mt-2 col-1 float-right" href="{{route('articles.index')}}">Back</a>--}}

    <div class="float-right">
        <a class="btn btn-primary text-light pr-4 pl-4" href="{{route('articles.index')}}">Back</a>
        {{--        <a class="btn btn-primary text-light pr-4 pl-4" href="{{route('articles.edit', $article)}}">Edit</a>--}}
    </div>
@endsection

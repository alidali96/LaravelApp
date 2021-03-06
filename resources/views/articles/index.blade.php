@extends('layouts.master')

@section('title', 'Articles')

@section('content')
    <h1>All Articles</h1>

    @foreach($articles as $article)
        <ul class="list-group" style="font-size: 1.2em">
            <li class="list-group-item">ID: {{$article->id}}</li>
            <li class="list-group-item">Name: <a
                    href="{{action('ArticleController@show', $article->id)}}">{{$article->name}}</a></li>
            <li class="list-group-item">Body: {{$article->body}}</li>
            <li class="list-group-item"><small>Author: {{$article->author_id}}</small></li>
        </ul><br/>
    @endforeach
@endsection

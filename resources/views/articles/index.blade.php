@extends('layouts.master')

@section('title', 'Articles')

@section('content')
    <h1>All Articles</h1>
    @foreach($articles as $article)
        <p>
            ID: {{$article->id}}<br/>
            Name: <a href="{{action('ArticleController@show', $article->id)}}">{{$article->name}}</a><br/>
            Body: {{$article->body}}<br/>
            Author: {{$article->author_id}}
        </p>
    @endforeach
@endsection

@extends('layouts.master')

@section('title', 'Articles')

@section('content')
    <h1 class="d-inline">All Articles</h1>
    <a href="{{route('articles.create')}}" class="btn btn-primary float-right m-1">[+] Add New</a>
    <div class="clearfix"></div>

    @foreach($articles as $article)
        <ul class="list-group" style="font-size: 1.2em">
            <li class="list-group-item  bg-dark text-light">ID: {{$article->id}}</li>
            <li class="list-group-item">Name: <a
                    href="{{action('ArticleController@show', $article->id)}}">{{$article->name}}</a></li>
            <li class="list-group-item">Body: {{$article->body}}</li>
            <li class="list-group-item">
                <small>Tags:</small>
                @foreach($article->tags as $tag)
                    <small class="tag">{{$tag->name}}</small>
                @endforeach
{{--                <small>Author: {{$article->author_id}}</small>--}}
                <a class="btn btn-success float-right" href="{{route('articles.show', $article->id)}}">Continue</a>
{{--                <a class="btn btn-primary float-right mr-1" href="{{route('articles.edit', $article->id)}}">Edit</a>--}}
                <form class="d-inline" action="{{action('ArticleController@destroy', $article->id)}}" method="post">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <input type="submit" class="btn btn-danger float-right mr-1" value="Delete">
                </form>
            </li>
        </ul><br/>
    @endforeach
    {{$articles->links()}}
@endsection

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
                <a class="btn btn-success float-right" href="{{action('ArticleController@restore', $article->id)}}">Restore</a>
                <a type="submit" class="btn btn-danger float-right mr-1" href="{{action('ArticleController@forceDelete', $article->id)}}">Force Delete</a>
            </li>
        </ul><br/>
    @endforeach
{{--    {{$articles->links()}}--}}
@endsection

@extends('layouts.master')

@section('title', "$article->name")

@section('content')
    <h2>Article #{{$article->id}}</h2>
    <p>
        Name: {{$article->name}}<br/>
        Body: {{$article->body}}<br/>
        Author: {{$article->author_id}}
    </p>
@endsection

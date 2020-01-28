@extends('layouts.master')

@section('content')
    <h3>About me: <a style="text-decoration: none;" href="{{route('contact.show')}}">{{$fullName}}</a></h3>
    <a class="lead text-primary text-capitalize" href="{{route('langs.show')}}">Things I know?</a>
@endsection

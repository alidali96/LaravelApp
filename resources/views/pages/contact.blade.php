@extends('layouts.master')

@section('title', 'Contact')

@section('content')
    <h1>Contact Page</h1>
    @if(!empty($email))
        <a href="mailto:{{$email}}">{{$email}}</a>
    @else
        {{"No email address given"}}
    @endif
@endsection

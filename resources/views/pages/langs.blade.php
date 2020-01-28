@extends('layouts.master')
@section('content')
    <ul>
        @forelse($items as $item)
            <li>{{$item}}</li>
            @empty
            <p>There's nothing you know!</p>
        @endforelse
    </ul>
@endsection

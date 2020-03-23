@extends('layouts.master')

@section('title', 'Create Category')

@section('content')
    <h1 class="d-inline">Create New Category</h1>

    <form action="{{action('CategoryController@store')}}" method="POST">
        @include('partials.categoriesForm', [
        'name' => old('name'),
        'description' => old('description'),
        'submitButton' => '[+] Create',
])
    </form>

    @include('partials.error')

@endsection

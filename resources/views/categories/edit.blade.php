@extends('layouts.master')


@section('content')
    <h1>Edit Category Form</h1>

    <form method="POST" action="
        {{ action('CategoryController@update', $category->id) }}">
        {{ method_field('PATCH') }}
        @include('partials.categoriesForm', [
            'name' => $category->name,
            'description' => $category->description,
            'submitButton' => '[~] Update',
 ])
    </form>

    @include('partials.error')

@endsection

@extends('layouts/app')

@section('content')
<!-- Collection -->
    @include('../partials/navigation')
    <section class="collection_intro">
        <h1>Add a collection</h1>
        <form method="post" action="{{url('/collection/store')}}">
            @csrf
            <label for="title">Collection title:</label><br>
            <input type="text" id="title" name="title"><br>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <br><br>
            <label for="description">Description:</label><br>
            <input type="text" id="description" name="description"><br>
            <input type="submit" value="Submit">
        </form> 
    </section>
@endsection
@extends('layouts/app')

@section('content')
<!-- Collection -->
    @include('../partials/navigation')
    <section class="collection_intro">
        <h1>Add a collection</h1>
        <form method="post" action="{{url('/collection/store')}}">
            <label for="title">Collection title:</label><br>
            <input type="text" id="title" name="title"><br>

            <label for="desc">Description:</label><br>
            <input type="text" id="desc" name="desc"><br>
            <input type="submit" value="Submit">
        </form> 
    </section>
@endsection
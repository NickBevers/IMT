@extends('layouts/app')

@section('content')
<!-- Collection -->
    @include('../partials/navigation')
    <section class="collection_intro">
        <h1>Add a collection</h1>
        <form method="post">
            <label for="fname">Collection title:</label><br>
            <input type="text" id="fname" name="fname"><br>

            <label for="lname">Description:</label><br>
            <input type="text" id="lname" name="lname"><br>
            <input type="submit" value="Submit">
        </form> 
    </section>
@endsection
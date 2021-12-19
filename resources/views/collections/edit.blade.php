@extends('layouts/app')

@section('content')
<!-- Edit User Profile -->
    <section class="profile_section">
        
        <img src="https://ipfs.io/ipfs/QmbRcKu5P6SGYnsiz35WBEW8qG7egMQVvdfptkqsgH4qX3" style="max-width:400px;" alt="Collection image">

        <div class="user_info_container">
        <form method="post" action="{{ url('/collection/edit')}}">
                @csrf
                <br>
                <div>
                    <label for="title">Title</label><br>
                    <input value="{{$collection->title}}" type="text" name="title" id="title" placeholder="">
                </div>
                <br>
                <div>
                    <label for="lastname">Description</label><br>
                    <textarea type="text" name="description" id="description" placeholder="{{$collection->description}}" rows="5" cols="21">{{$collection->description}}</textarea>
                </div>
                <br>
                <input type='hidden' name='old_value' value="{{$collection->id}}">
                <br>
                <button type="submit" class="confirm_btn">Save</button>
                <a href="/collection/detail/{{ $collection->id }}" class="cancel_btn">Cancel</a>
        </form>
        <br>
        </div>
    </section>
@endsection
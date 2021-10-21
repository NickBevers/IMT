@extends('layouts/app')

@section('content')
<!-- Edit User Profile -->
    @include('partials/navigation')

    <section class="profile_section">
        
        <img src="{{ asset('images/test.jpg') }}" alt="Collection image">

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
                    <textarea type="text" name="description" id="description" placeholder="{{$collection->description}}" rows="5" cols="18">{{$collection->description}}</textarea>
                </div>
                <br>
                <input type='hidden' name='old_value' value="{{$collection->id}}">
                <br>
                <button type="submit" class="confirm_btn" style="margin-left: 65px;">Save</button>
        </form>
        <br>
            <a href="../detail/{{ $collection->title }}" class="edit_btn">Cancel</a>
        </div>
    </section>
@endsection
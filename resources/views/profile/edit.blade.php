@extends('layouts/app')

@section('content')
<!-- Edit User Profile -->
    @include('partials/navigation')

    <section class="profile_section">
        
        <img class="profile_picture" src="{{ url( Auth::user()->profile_picture) }}" alt="Profile picture">

        <div class="user_info_container">
        <form method="post" action="{{ url('/edit') }}" enctype="multipart/form-data">
                @csrf
                <br>
                <div>
                    <label for="profilePicture">Profile picture</label>
                    <input type="file" name="profilePicture" id="profilePicture" accept="image/png, image/jpeg">
                </div>
                <br>
                <div>
                    <label for="firstname">Firstname</label>
                    <input value="{{ Auth::user()->first_name }}" type="text" name="firstname" id="username" placeholder="{{ Auth::user()->first_name }}">
                </div>
                <br>
                <div>
                    <label for="lastname">Lastname</label>
                    <input value="{{ Auth::user()->last_name }}" type="text" name="lastname" id="username" placeholder="{{ Auth::user()->last_name }}">
                </div>
                <br>
                <div>
                    <label for="email">Email adress</label>
                    <input value="{{Auth::user()->email}}" type="text" name="email" id="email" placeholder="{{Auth::user()->email}}">
                </div>
                <br>
                <button type="submit" class="save_btn">Save</button>
            <a href="/user" class="cancel_btn">Cancel</a>
        </form>
        </div>
    </section>
@endsection
@extends('layouts/app')

@section('content')
<!-- Edit User Profile -->
    @include('partials/navigation')

    <section class="profile_section">
        
        <img class="profile_picture" src="{{ asset('images/' . Auth::user()->profile_picture) }}" alt="Profile picture">

        <div class="user_info_container">
        <form method="post" action="{{ url('/edit') }}">
                @csrf
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
                <button type="submit" class="login_btn">Save</button>
        </form>
        <br>
            <a href="/user" class="edit_btn">Cancel</a>
        </div>
    </section>
@endsection
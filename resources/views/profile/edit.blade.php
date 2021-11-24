@extends('layouts/app')

@section('content')
<!-- Edit User Profile -->
    <section class="profile_section">
        
        <img class="profile_picture" src="{{ url( Auth::user()->profile_picture) }}" alt="Profile picture">

        <div class="user_info_container">
        <form method="post" action="{{ url('/edit') }}" enctype="multipart/form-data">
                @csrf
                <br>
                @if ($flash = session('message'))
                    <ul style="color: red;">
                        <li>{{ $flash }}</li>
                    </ul>
                @endif
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
                <div>
                    <label for="old_password">Old password</label>
                    <input value="" type="password" name="old_password" id="old_password" placeholder="********">
                </div>
                <br>
                <div>
                    <label for="new_password">New password</label>
                    <input value="" type="password" name="new_password" id="new_password" placeholder="********">
                </div>
                <br>
                <button type="submit" class="save_btn">Save</button>
            <a href="/user" class="cancel_btn">Cancel</a>
        </form>
        </div>
    </section>
@endsection
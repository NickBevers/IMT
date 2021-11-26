@extends('layouts/app')

@section('content')
<!-- Sign up -->
    <section class="login_signup_intro_section">
        <a href="../" class="login_signup_back_btn">Go back</a>
        <section class="intro_section">
            <div class="intro_wrapper">
                <h1>Interactive <br> Multimedia <br> Tokens</h1>
                <h3>Sweet dreams are made of NFT's</h3>
            </div>
        </section>

        {{-- @if($errors->any())
            <ul style="color: red;">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>

        @endif --}}
        
        <section class="login_signup_section">
            <form method="post" action="{{ url('/signup') }}">
                @csrf
                <div>
                    <label for="firstname">Firstname</label>
                    <input value="{{ old('firstname') }}" type="text" name="firstname" id="username" placeholder="Bailey">
                    @error('firstname')
                        <div class="error_message">{{$message}}</div>
                    @enderror
                    @if( $flash = session('message'))
                        <p>{{ $flash }}</p>
                    @endif
                </div>
                
                <div>
                    <label for="lastname">Lastname</label>
                    <input value="{{ old('lastname') }}" type="text" name="lastname" id="username" placeholder="TheDino">
                    @error('lastname')
                        <div class="error_message">{{$message}}</div>
                    @enderror
                </div>

                <div>
                    <label for="email">Email address</label>
                    <input value="{{ old('email') }}" type="text" name="email" id="email" placeholder="john@doe.com">
                    @error('email')
                        <div class="error_message">{{$message}}</div>
                    @enderror
                </div>
                
                <div>
                    <label for="password">Password</label>
                    <input value="{{ old('password') }}" type="password" name="password" id="password" placeholder="******">
                    @error('password')
                        <div class="error_message">{{$message}}</div>
                    @enderror
                </div>

                <!--<div>
                    <label for="password_verify">Password verify</label>
                    <input type="password" name="password_verify" id="password_verify" placeholder="******">
                </div>-->
        
                <button type="submit" class="login_btn">Register</button>
            </form>
            <a href="/login" class="signup_btn">I already have an account</a>
        </section>
    </section>
@endsection
@extends('layouts/app')

@section('content')
<!-- Login -->
    <section class="login_signup_intro_section">
        <a href="../" class="login_signup_back_btn">Go back</a>
        <section class="intro_section">
            <div class="intro_wrapper">
                <h1>Interactive <br> Multimedia <br> Tokens</h1>
                <h3>Sweet dreams are made of NFT's</h3>
            </div>
        </section>

        @if ($flash = session('message'))
            <ul style="color: green;">
                <li>{{ $flash }}</li>
            </ul>
        @elseif ($flash = session('messageAuth'))
            <ul style="color: red;">
                <li>{{ $flash }}</li>
            </ul>
        @endif
        
        <section class="login_signup_section">
            <form method="post" action="{{ url('/login') }}">
            @csrf
                <div>
                    <label for="email">Email adress</label>
                    <input type="text" name="email" id="email" placeholder="john@doe.com">
                </div>
                
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="******">
                </div>
        
                <button type="submit" class="login_btn">Log in</button>
            </form>
            <a href="/signup" class="signup_btn">Register</a>
        </section>
    </section>
@endsection
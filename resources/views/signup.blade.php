<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>signup</title>

    @include('partials/imports')
</head>
<body>
    <section class="login_signup_intro_section">
        <a href="../" class="login_signup_back_btn">Go back</a>
        <section class="intro_section">
            <h1>Interactive <br> Multimedia <br> Tokens</h1>
            <h3>Sweet dreams are made of NFT's</h3>
        </section>
        
        <section class="login_signup_section">
            <form action="post">
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="BaileyTheDino">
                </div>

                <div>
                    <label for="email">Email adress</label>
                    <input type="text" name="email" id="email" placeholder="john@doe.com">
                </div>
                
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="******">
                </div>

                <div>
                    <label for="password_verify">Password verify</label>
                    <input type="password" name="password_verify" id="password_verify" placeholder="******">
                </div>
        
                <button type="submit">register</button>
            </form>
            <a href="/login">I already have an account</a>
        </section>
    </section>
</body>
</html>
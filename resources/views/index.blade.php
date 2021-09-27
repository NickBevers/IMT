<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMT</title>
    
    @include('partials/imports')

</head>
<body>
    @include('partials/navigation')

    <section class="header_section">
        <div class="intro_container">
            <h1>Student NFT'S?!</h1>

            <p>
                IMT, Interactive Multimedia Tokens. You might wonder 
                what the point of them is. Well let me tell you! Students from
                the course Interactive Multimedia Design creat original work ALL of the time.
                <br> <br>
                We, the team behind IMT are also students from this very course. And we 
                wanted to show off these works in an original manner.
            </p>
            <div>
                <a href="#">Buy stuff</a>
                <a href="#">Sell stuff</a>
            </div>
        </div>
        <div>
            <img id="showcase_img" src="{{ asset('images/test.jpg') }}" alt="test">
        </div>
    </section>

    <section class="recent_section">
        <h2>Fresh from the students</h2>
        <div class="scroll_recent">
            <img class="recent_thumbnail" src="{{ asset('images/test.jpg') }}">
            <img class="recent_thumbnail" src="{{ asset('images/test.jpg') }}">
            <img class="recent_thumbnail" src="{{ asset('images/test.jpg') }}">
            <img class="recent_thumbnail" src="{{ asset('images/test.jpg') }}">
            <img class="recent_thumbnail" src="{{ asset('images/test.jpg') }}">
            <img class="recent_thumbnail" src="{{ asset('images/test.jpg') }}">
            <img class="recent_thumbnail" src="{{ asset('images/test.jpg') }}">
            <img class="recent_thumbnail" src="{{ asset('images/test.jpg') }}">
            <img class="recent_thumbnail" src="{{ asset('images/test.jpg') }}">
            <img class="recent_thumbnail" src="{{ asset('images/test.jpg') }}">
        </div>
    </section>
    
    <section class="how_section">
        <h2>How does it work?</h2>
        <div class="how_img_container">
            <img class="how_img" src="{{ asset('images/test.jpg') }}">
            <img class="how_img" src="{{ asset('images/test.jpg') }}">
            <img class="how_img" src="{{ asset('images/test.jpg') }}">
        </div>
    </section>

    <section class="money_section">
        <h2>Where does the money go?</h2>
        <div class="money_img_container">
            <img class="money_img" src="{{ asset('images/test.jpg') }}">
        </div>
    </section>
    
    @include('partials/footer')
</body>
</html>
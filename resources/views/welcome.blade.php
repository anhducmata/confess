<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway';
                font-weight: 100;
                height: 100%;
                margin: 0;
            }

            .full-height {
                height: 100%;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .top-left {
                position: absolute;
                left: 80px;
                top: 18px;
            }
            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

svg {
    display: block;
    font: 200px 'Montserrat';
    margin: 0 auto;
}

.text-copy {
    fill: none;
    stroke: white;
    stroke-dasharray: 6% 29%;
    stroke-width: 5px;
    stroke-dashoffset: 0%;
    animation: stroke-offset 5.5s infinite linear;
}

.text-copy:nth-child(1){
    stroke: #4D163D;
    animation-delay: -1;
}

.text-copy:nth-child(2){
    stroke: #840037;
    animation-delay: -2s;
}

.text-copy:nth-child(3){
    stroke: #BD0034;
    animation-delay: -3s;
}

.text-copy:nth-child(4){
    stroke: #BD0034;
    animation-delay: -4s;
}

.text-copy:nth-child(5){
    stroke: #FDB731;
    animation-delay: -5s;
}

@keyframes stroke-offset{
    100% {stroke-dashoffset: -35%;}
}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-left links">
                    <a href="{{ url('/home') }}" title="">Home</a>
                </div>
            @if (!Auth::check())    
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                        <svg  width="100%" height="100%">
    <symbol id="s-text">
        <text text-anchor="middle" x="50%" y="100%">Confess </text>
    </symbol>

    <g class = "g-ants">
        <use xlink:href="#s-text" class="text-copy"></use>
        <use xlink:href="#s-text" class="text-copy"></use>
        <use xlink:href="#s-text" class="text-copy"></use>
        <use xlink:href="#s-text" class="text-copy"></use>
        <use xlink:href="#s-text" class="text-copy"></use>
    </g>
</svg>
                </div>

                <div class="links" style="font-size: 50px;">
                    <a class="links" style="font-size: 40px;" href="{{ url('/home') }}" title="">
                        CONFESS YOUR DEEPEST, DARKEST SECRET
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>

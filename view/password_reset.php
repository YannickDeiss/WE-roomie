<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="dist/css/styles.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
            integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
            crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js"></script>
    <title>Roomie - Find your Roommate today</title>
</head>

<body>
<!-- MODAL: LOGIN -->
<div class="login-modal">
    <div class="modal-content">
        <div class="fas fa-times-circle" id="close-login-modal-button"></div>
        <div class="login-left">
            <div class="login unselectable">Login</div>
            <div class="eula unselectable">By logging in you agree to the ridiculously long terms that you didn't bother
                to read
            </div>
        </div>
        <div class="login-right">
            <svg class="snake" viewBox="0 0 320 300">
                <defs>
                    <linearGradient inkscape:collect="always" id="linearGradient" x1="13" y1="193.49992" x2="307"
                                    y2="193.49992" gradientUnits="userSpaceOnUse">
                        <stop style="stop-color:#030303;" offset="0" id="stop876"/>
                        <stop style="stop-color:#030303;" offset="1" id="stop878"/>
                    </linearGradient>
                </defs>
                <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143"
                />
            </svg>
            <div class="form">
                <label class="login-label unselectable" for="login-email">Email</label>
                <input type="email" id="login-email">
                <label class="login-label unselectable" for="login-password">Password</label>
                <input type="password" id="login-password">
                <input type="submit" id="login-submit" value="Submit">
                <div class="reset-link">
                    <a href="#">Reset Password</a>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- /END MODAL: LOGIN -->

<!-- MODAL: SIGNUP -->
<div class="signup-modal">
    <div class="modal-content">
        <div class="fas fa-times-circle" id="close-signup-modal-button"></div>
        <div class="login-left">
            <div class="login unselectable">Sign Up</div>
            <div class="eula">By signing up in you agree to the ridiculously long terms that you didn't bother to read
            </div>
        </div>
        <div class="login-right">
            <svg class="snake" viewBox="0 0 320 300">
                <defs>
                    <linearGradient inkscape:collect="always" id="linearGradient" x1="13" y1="193.49992" x2="307"
                                    y2="193.49992" gradientUnits="userSpaceOnUse">
                        <stop style="stop-color:#030303;" offset="0" id="stop876"/>
                        <stop style="stop-color:#030303;" offset="1" id="stop878"/>
                    </linearGradient>
                </defs>
                <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143"
                />
            </svg>
            <div class="form">
                <label class="login-label" for="email">Email</label>
                <input type="email" id="signup-email" id="email">
                <label class="login-label" for="password">Password</label>
                <input type="password" id="signup-password">
                <input type="submit" id="signup-submit" value="Submit">
            </div>
        </div>
    </div>
</div>
<!-- /END MODAL: SIGNUP -->
<div class="container">
    <nav class="nav">
        <div id="cssmenu">
            <div class="roomie-logo">
                <img src="dist/images/logo.png" alt="Roomie" width="120rem" height="50rem">
            </div>
            <ul>
                <li>
                    <a href='homepage.php'>
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="active">
                    <a href='#' class="login-trigger">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                    </a>
                </li>
                <li>
                    <a href='#' class="signup-trigger">
                        <i class="fas fa-ellipsis-v"></i>
                        <span>Sign up</span>
                    </a>
                </li>
                <li>
                    <a href='#'>
                        <i class="fas fa-user"></i>
                        <span>Hermann</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="content">
        <div class="reset-content">
            <div class="reset-left">
                <div class="reset unselectable">Password Reset</div>
                <div class="eula unselectable">Enter your email address to reset your password</div>
            </div>
            <div class="reset-right">
                <svg class="snake" viewBox="0 0 320 300">
                    <defs>
                        <linearGradient inkscape:collect="always" id="linearGradient" x1="13" y1="193.49992" x2="307"
                                        y2="193.49992" gradientUnits="userSpaceOnUse">
                            <stop style="stop-color:#030303;" offset="0" id="stop876"/>
                            <stop style="stop-color:#030303;" offset="1" id="stop878"/>
                        </linearGradient>
                    </defs>
                    <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143"
                    />
                </svg>
                <div class="form">
                    <label class="reset-label unselectable" for="reset-email">Email</label>
                    <input type="email" id="reset-email">
                    <label class="reset-label unselectable" for="password"></label>
                    <input class="unselectable" type="password" id="password">
                    <input type="submit" id="reset-submit" value="Submit">
                </div>
            </div>
        </div>
    </main>


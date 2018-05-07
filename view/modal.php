<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 07.05.2018
 * Time: 15:26
 */
?>
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
                    <a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/password/reset" class="forgot">Reset Password</a>

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
                <label class="login-label" for="signup-email">Email</label>
                <input type="email" id="signup-email">
                <label class="login-label" for="signup-password">Password</label>
                <input type="password" id="signup-password">
                <input type="submit" id="signup-submit" value="Submit">
            </div>
        </div>
    </div>
</div>

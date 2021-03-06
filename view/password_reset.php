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
            <form class="form" action="<?php echo $GLOBALS["ROOT_URL"]; ?>/password/reset" method="POST">
                <label class="reset-label unselectable" for="reset-email">Email</label>
                <input type="email" name="email" id="reset-email" required>
                <label class="reset-label unselectable" for="password"></label>
                <input class="unselectable" name="password" type="password" id="password" readonly>
                <input type="submit" id="reset-submit" value="Submit">
            </form>
        </div>
    </div>
</main>
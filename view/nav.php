<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 07.05.2018
 * Time: 14:18
 */
?>


<div class="container">
    <nav class="nav">
        <div id="cssmenu">
            <div class="roomie-logo">
                <img class="wobble" src="dist/images/logo.png" alt="Roomie" width="120rem" height="50rem">
            </div>
            <ul>
                <li class="active">
                    <a href='<?php echo $GLOBALS["ROOT_URL"]; ?>/'>
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
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
            </ul>
        </div>
    </nav>

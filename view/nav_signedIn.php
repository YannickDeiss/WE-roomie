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
                    <a href='#'>
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href='<?php echo $GLOBALS["ROOT_URL"]; ?>/user'>
                        <i class="fas fa-user"></i>
                        <span>Hermann</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

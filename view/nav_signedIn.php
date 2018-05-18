<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 07.05.2018
 * Time: 14:18
 */

use service\AuthServiceImpl;

$user = AuthServiceImpl::getInstance()->readUser();
$userName = '';
if (!empty($user->getUserName())){
    $userName = $user->getUserName();
}else{
    $userName = $user->getEmail();
    $userName = explode('@', $userName);
}
$userName = substr($userName,0,15).' ...';
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
                    <a href='<?php echo $GLOBALS["ROOT_URL"]; ?>/user'>
                        <i class="fas fa-user"></i>
                        <span><?php echo $userName?></span>
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

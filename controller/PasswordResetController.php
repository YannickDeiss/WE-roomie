<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 16.10.2017
 * Time: 14:26
 */

namespace controller;

use service\AuthServiceImpl;
use view\LayoutRendering;
use view\TemplateView;
use validator\UserValidator;
use service\EmailServiceClient;

class PasswordResetController
{

    public static function resetView(){
        $resetView = new TemplateView("password_reset.php");
        //$resetView->token = $_GET["token"];
        LayoutRendering::basicLayout($resetView);
    }
    
    public static function requestView(){
        $view = new TemplateView("password_request.php");
        LayoutRendering::basicLayout($view);
    }
    
    public static function reset(){
        if(AuthServiceImpl::getInstance()->validateToken($_POST["token"])){
            $user = AuthServiceImpl::getInstance()->readUser();
            $user->setPassword($_POST["password"]);
            $userValidator = new UserValidator($user);
            if($userValidator->isValid()){
                if(AuthServiceImpl::getInstance()->editUser($user)){
                    return true;
                }
            }
            $user->setPassword("");
            $resetView = new TemplateView("view/assets/resetPassword/resetPassword.php");
            $resetView->token = $_POST["token"];
            LayoutRendering::basicLayout($resetView);
            return false;
        }
        return false;
    }

    public static function resetEmail(){
        $token = AuthServiceImpl::getInstance()->issueToken(AuthServiceImpl::RESET_TOKEN, $_POST["email"]);
        $emailView = new TemplateView("userPasswordResetEmail.php");
        $emailView->resetLink = $GLOBALS["ROOT_URL"] . "/password/reset?token=" . $token;
        return EmailServiceClient::sendEmail($_POST["email"], "Password Reset Email", $emailView->render());
    }

    public static function checkEmailView()
    {
        $view = new TemplateView("view/assets/checkMails/checkMail.php");
        LayoutRendering::basicLayout($view);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: LorisGrether
 * Date: 08.05.2018
 * Time: 14:24
 */

namespace controller;


use dao\UserDAO;
use domain\User;

use service\AuthServiceImpl;
use view\LayoutRendering;
use view\TemplateView;

use validator\ListingValidator;
use validator\UserValidator;

class RegisterController
{
    public static function registerUser($view = null)
    {
        $user = new User();
        $user->setUserName($_POST["email"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $userValidator = new UserValidator($user);
        if ($userValidator->isValid()) {
            if (AuthServiceImpl::getInstance()->createUser($user)) {
                return true;
            } else if ($user->getEmailError() && is_null($view)) {
                $userValidator->setEmailError("Email already exists");
            } else if ($user->getUserNameError() && is_null($view)) {
                $userValidator->setUserNameError("Username already exists");
            }
        }
            $user->setPassword("");
            if (is_null($view))
                $view = new TemplateView("view/modal.php");
            $view->user = $user;
            $view->userValidator = $userValidator;
            LayoutRendering::basicLayout($view);
            return false;
    }

    public static function validateUserEntry(){
        $user = new User();
        $user->setUserName($_POST["name"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $userValidator = new UserValidator($user);
        if ($userValidator->isValid()) {
            return true;
        }
        return false;
    }

    public static function editUser($view = null)
    {
        $user = new User();
        $user->setUserName($_POST["name"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $userValidator = new UserValidator($user);
        if ($userValidator->isValid()) {
            if (AuthServiceImpl::getInstance()->editUser($user)) {
                return true;
            } else if ($user->getEmailError() && is_null($view)) {
                $userValidator->setEmailError("Email already exists");
            } else if ($user->getUserNameError() && is_null($view)) {
                $userValidator->setUserNameError("Username already exists");
            }
        }
        $user->setPassword("");
        if (is_null($view))
            $view = new TemplateView("view/modal.php");
        $view->user = $user;
        $view->userValidator = $userValidator;
        LayoutRendering::basicLayout($view);
        return false;
    }

}
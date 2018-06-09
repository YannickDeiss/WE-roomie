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
        $user->setUserName('');
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
        return true;
    }

    public static function editView()
    {
        $view = new TemplateView("view/user_profile_edit.php");
        $view->user = AuthServiceImpl::getInstance()->readUser();
        LayoutRendering::basicLayout($view);
    }

    public static function validateUserEntry()
    {
        $user = new User();
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $emailOK = true;
        if (!AuthServiceImpl::getInstance()->findByEmail($user)) {
            $emailOK = false;
        }
        return $arr = array('email' => $emailOK);
    }


    public static function update()
    {
        $user = new User();
        $user->setUserName($_POST["userName"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["oldPassword"]);
        $user->setNewPassword($_POST["newPassword"]);

        $userValidator = new UserValidator($user, true);
        if ($userValidator->isValid()) {
            if (AuthServiceImpl::getInstance()->editUser($user)) {
                return true;
            } else if ($user->getEmailError()) {
                $userValidator->setEmailError("Email already exists");
            }
        }
        $user->setPassword("");
        $view = new TemplateView("view/user_profile_edit.php");
        $view->user = $user;
        $view->userValidator = $userValidator;
        LayoutRendering::basicLayout($view);
        return false;
    }
}
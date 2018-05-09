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

class RegisterController
{
    public static function registerUser($view = null)
    {
        print_r($_POST);

        $user = new User();

        //$user->setUserName($_POST["email"]);
        echo $user->getUserName();
        $user->setEmail($_POST["email"]);
        echo $user->getEmail();
        $user->setPassword($_POST["password"]);
        echo $user->getPassword();



        //$userValidator = new UserValidator($user);

        $userDAO = new UserDAO();
        $userDAO->create($user);
    }


    public static function register($view = null)
    {
        $user = new User();
        //$user->setUserName($_POST["name"]);
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
            $view = new TemplateView("view/assets/registration/register.php");
        $view->user = $user;
        $view->userValidator = $userValidator;
        LayoutRendering::basicLayout($view);
        return false;
    }

}
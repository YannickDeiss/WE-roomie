<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 07.05.2018
 * Time: 12:45
 */

namespace validator;

use domain\User;

class UserValidator
{
    private $valid = true;
    private $nameError = null;
    private $emailError = null;
    private $passwordError = null;
    private $newPasswordError = null;
    private $passwordMatchError = null;

    public function __construct(User $user = null)
    {
        if (!is_null($user)) {
            $this->validate($user);
        }
    }

    public function validate(User $user)
    {
        if (!is_null($user)) {
            if (empty($user->getEmail())) {
                $this->emailError = 'Please enter an email address';
                $this->valid = false;
            } else if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
                $this->emailError = 'Please enter a valid email address';
                $this->valid = false;
            }
            if (empty($user->getPassword())) {
                $this->passwordError = 'Please enter a password';
                $this->valid = false;
            }else if(empty($user->getNewPassword())) {
                    $this->newPasswordError = 'Please enter your new password';
                    $this->valid = false;
                }

                else if($user->getPassword() !== $user->getNewPassword()){
                    $this->newPasswordError = 'Passwords did not match';
                    $this->valid = false;
                }
        } else {
            $this->valid = false;
        }
        return $this->valid;

    }

    public function isValid()
    {
        return $this->valid;
    }

    public function isNameError()
    {
        return isset($this->nameError);
    }

    public function getNameError()
    {
        return $this->nameError;
    }

    public function isEmailError()
    {
        return isset($this->emailError);
    }

    public function getEmailError()
    {
        return $this->emailError;
    }

    public function setEmailError($emailError)
    {
        $this->emailError = $emailError;
        $this->valid = false;
    }

    public function isPasswordError()
    {
        return isset($this->passwordError);
    }

    public function getPasswordError()
    {
        return $this->passwordError;
    }

    public function getPasswordMatchError()
    {
        return $this->passwordMatchError;
    }

    public function setPasswordMatchError($passwordMatchError)
    {
        $this->passwordMatchError = $passwordMatchError;
        $this->valid = false;
    }
}
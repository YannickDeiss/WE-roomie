<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 5/7/2018
 * Time: 2:07 PM
 */

namespace domain;


class User
{
    /**
     * @AttributeType int
     */
    protected $id;
    /**
     * @AttributeType String
     */
    protected $username = "";
    /**
     * @AttributeType String
     */
    protected $password;
    /**
     * @AttributeType String
     */

    protected $newPassword;
    /**
     * @AttributeType String
     */
    protected $email;

    protected $emailError;

    protected $passwordMatchError;


    /**
     * @access public
     * @return int
     * @ReturnType int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @access public
     * @return String
     * @ReturnType String
     */
    public function getUserName()
    {
        return $this->username;
    }

    /**
     * @access public
     * @param String name
     * @return void
     * @ParamType name String
     * @ReturnType void
     */
    public function setUserName($userName)
    {
        $this->username = $userName;
    }

    /**
     * @access public
     * @return String
     * @ReturnType String
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @access public
     * @param String password
     * @return void
     * @ParamType password String
     * @ReturnType void
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @access public
     * @return String
     * @ReturnType String
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @access public
     * @param String email
     * @return void
     * @ParamType email String
     * @ReturnType void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function set($currentUserId)
    {
        $this->id = $currentUserId;

    }

    public function setEmailError($hasError)
    {
        $this->emailError = $hasError;
    }

    public function setPasswordMatchError($hasError)
    {
        $this->passwordMatchError = $hasError;
    }

    /**
     * @return mixed
     */
    public function getEmailError()
    {
        return $this->emailError;
    }

    /**
     * @return mixed
     */
    public function getPasswordMatchError()
    {
        return $this->passwordMatchError;
    }

    /**
     * @return mixed
     */
    public function getNewPassword()
    {
        return $this->newPassword;
    }

    /**
     * @param mixed $newPassword
     */
    public function setNewPassword($newPassword): void
    {
        $this->newPassword = $newPassword;
    }



}
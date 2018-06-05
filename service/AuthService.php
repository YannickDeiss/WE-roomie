<?php
/**
 * Created by PhpStorm.
 * User: Tobias
 * Date: 07.05.2018
 * Time: 12:45
 */

namespace service;

use domain\Agent;
use domain\User;

/**
 * @access public
 * @author andreas.martin
 */
interface AuthService {
    /**
     * @AttributeType int
     */
    const AGENT_TOKEN = 1;
    /**
     * @AttributeType int
     */
    const RESET_TOKEN = 2;

    /**
     * @access public
     * @param String email
     * @param String password
     * @return boolean
     * @ParamType email String
     * @ParamType password String
     * @ReturnType boolean
     */
    public function verifyUser($email, $password);

    /**
     * @access public
     * @return Agent
     * @ReturnType Agent
     */
    public function readUser();

    /**
     * @access public
     * @param $user User
     * @return boolean
     * @ParamType name string
     * @ParamType email String
     * @ParamType password String
     * @ReturnType boolean
     */
    public function editUser(User $user);

    /**
     * @access public
     * @param String token
     * @return boolean
     * @ParamType token String
     * @ReturnType boolean
     */
    public function validateToken($token);

    /**
     * @access public
     * @param int type
     * @param String email
     * @return String
     * @ParamType type int
     * @ParamType email String
     * @ReturnType String
     */
    public function issueToken($type = self::AGENT_TOKEN, $email = null);
}
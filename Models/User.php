<?php
/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/10
 * Time: 11:21
 */

class User{
    private $id;
    private $username;
    private $password;

    public function __construct($username,$password){
        $this->username=$username;
        $this->password=$password;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}

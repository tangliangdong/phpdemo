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
    private $type;

    public function __construct($username,$password,$type){
        $this->username=$username;
        $this->password=$password;
        $this->type = $type;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {                        
        $this->type = $type;  
    }

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

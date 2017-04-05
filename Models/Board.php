<?php

/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/31
 * Time: 12:01
 */
class Board
{
 private $id;
 private $text;

    /**
     * Board constructor.
     * @param $id
     * @param $text
     */
    public function __construct($id, $text)
    {
        $this->id = $id;
        $this->text = $text;
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
     * @return Board
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


}
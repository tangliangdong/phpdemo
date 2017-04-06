<?php

/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/31
 * Time: 12:13
 */
class Post
{
    private $id;
    private $board_id;
    private $text;
    private $author_id;
    private $own_id;

    /**
     * Post constructor
     * @param $board_id
     * @param $text
     * @param $author_id
     * @param $own_id
     */
    public function __construct($id,$board_id, $text, $author_id, $own_id)
    {
        $this->id = $id;
        $this->board_id = $board_id;
        $this->text = $text;
        $this->author_id = $author_id;
        $this->own_id = $own_id;
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
    public function getBoardId()
    {
        return $this->board_id;
    }

    /**
     * @param mixed $board_id
     */
    public function setBoardId($board_id)
    {
        $this->board_id = $board_id;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    /**
     * @param mixed $author_id
     */
    public function setAuthorId($author_id)
    {
        $this->author_id = $author_id;
    }

    /**
     * @return mixed
     */
    public function getOwnId()
    {
        return $this->own_id;
    }

    /**
     * @param mixed $own_id
     */
    public function setOwnId($own_id)
    {
        $this->own_id = $own_id;
    }

}
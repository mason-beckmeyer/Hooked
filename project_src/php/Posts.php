<?php
class Posts{
    private $user;
    private $postText;
    private $postPicURL = null;
    private $dateOfPost;

    function __construct($user,$postText,$postPicURL){
        $this->user = $user;
        $this->postText = $postText;
        $this->postPicURL = $postPicURL;
        $this->dateOfPost = date_create();
    }

    function get_user(){
        return $this->user;
    }
    function get_postText(){
        return $this->postText;
    }
    function get_postPicURL(){
        return $this->postPicURL;
    }
    function get_date(){
        return $this->dateOfPost;
    }
}


?>
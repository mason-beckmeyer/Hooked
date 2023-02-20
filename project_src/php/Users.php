
<?php
class Users{
    private $username;
    private $email;
    private $password;
    private $bio = "";
    private $isAlumni = false;
    private $isStudent = false;
    private $isCompany = false;
    private $isFaculty = false;
    //Array of user posts
    private $posts = array();
    //Array pf users following this user
    private $followers = array();
    //Array of users following
    private $following = array();

    function __construct($username,$email,$password,$bio,$isAlumni,$isStudent,$isCompany,$isFaculty){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->bio = $bio;
        $this->isAlumni = $isAlumni;
        $this->isStudent = $isStudent;
        $this->isCompany = $isCompany;
        $this->isFaculty = $isFaculty;
    }


    function get_username(){
        return $this->username;
    }
    function get_email(){
        return $this->email;
    }
    function get_password(){
        return $this->password;
    }
    function get_bio(){
        return $this->bio;
    }
    function get_alum(){
        return $this->isAlumni;
    }
    function get_student(){
        return $this->isStudent;
    }
    function get_Company(){
        return $this->isCompany;
    }
    function get_Faculty(){
        return $this->isFaculty;
    }
    function get_Posts(){
        return $this->posts;
    }
    function get_Followers(){
        return $this->followers;
    }
    function get_Following(){
        return $this->following;
    }

    function add_Posts($post){
        array_push($this->posts,$post);
    }
    function add_follower($user){
        array_push($this->followers,$user);
    }
    function add_following($user){
        array_push($this->following,$user);
    }


}

?>
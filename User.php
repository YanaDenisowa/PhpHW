<?php
/**
 * Created by PhpStorm.
 * User: yana
 * Date: 21.02.21
 * Time: 9:32
 */

class User {
    public $id;
    public $name;
    public $email;
    public $phone;
    public $password;
    public $role;
    public $ban;
    public $avatar;

    function __construct($array) {
        $this->id = $array['id'];
        $this->name = $array['Name'];
        $this->email = $array['Email'];
        $this->phone = $array['Phone'];
        $this->password = $array['Password'];
        $this->role = $array['Role'];
        $this->ban = $array['Ban'];
        $this->avatar = $array['Photo'];
    }
}


<?php
namespace App\Services;

class UserServices{

    protected $users;

    public function __construct($users){
        $this->users = $users;
    }

    public function listUsers(){
        return $this->users;
    }
}
?>
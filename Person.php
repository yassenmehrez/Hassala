<?php
include_once 'DataBase.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person
 *
 * @author root
 */
class Person {
    //put your code here
    public $user_name;
    public $password;
    
    public function LogIn($user_name, $password) {
        if ($this->user_name == $user_name && $this->password == $password)
            return TRUE;
        else
            return FALSE;
    }
    
    public function LogOut()
    {
        
    }
}

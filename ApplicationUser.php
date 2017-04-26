<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApplicationUser
 *
 * @author root
 */
include_once 'Person.php';
class ApplicationUser extends Person{
    
    public $email;
    public $first_name;
    public $last_name;
    
    public function SignUp($email, $first_name, $last_name) {
        $this->email= $email;
        $this->first_name= $first_name;
        $this->last_name= $last_name;    
    }
    
    public function EditProfile($email, $first_name, $last_name) {
        $this->SignUp($email, $first_name, $last_name);   
    }
    
    public function SolveProblem($param) {
        
    }
    
    public function ResetPassword($password) {
        $this->password = $password;
    }
}

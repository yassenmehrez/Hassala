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

include_once 'Material.php';

class ApplicationUser extends Person {

    private $FirstName;
    private $LastName;
    private $email;
    private $Gender;
    private $University;
    private $codeForces_handle;
    private $solvedProblems;

    // setters
    public function set_firstName($firstName) {
        $this->FirstName = $firstName;
    }

    public function set_lastName($lastName) {
        $this->LastName = $lastName;
    }

    public function set_email($Email) {
        $this->email = $Email;
    }

    public function set_gender($gen) {
        $this->Gender = $gen;
    }

    public function set_univeristy($univ) {
        $this->University = $univ;
    }

    public function set_codeForces_handle($var) {
        $this->codeForces_handle = $var;
    }

    public function increment_solvedProblems() {
        $this->solvedProblems++;
    }

    // getters
    public function get_firstName() {
        return $this->FirstName;
    }

    public function get_lastName() {
        return $this->LastName;
    }

    public function get_email() {
        return $this->email;
    }

    public function get_gender() {
        return $this->Gender;
    }

    public function get_univeristy() {
        return $this->University;
    }

    public function get_codeForces_handle() {
        return $this->codeForces_handle;
    }

    public function get_solvedProblems() {
        return $this->solvedProblems;
    }

    public function SignUp() {
        
    }

    public function login($username, $pass) {
        $data = $this->get_username_password($username, $pass);

        if ($data['user_name'] == $username && $data['password'] == $pass) {
            if ($data['type'] == 0) {// student
                echo 'student';
            } else if ($data['type'] == 1) { // instructor
            }
        } else {
            return False;
        }
    }

    public function Reset_pass($username, $password) {
        
    }

    public function EditeProfile($email, $first_name, $last_name) {
        //$this->SignUp($email, $first_name, $last_name);   
    }

    public function SolveProblem($param) {
        
    }

}

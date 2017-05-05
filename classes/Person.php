<?php

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
include_once realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .'initialize.inc.php');
class Person {

    public $userName;
    public $password;
    private $db;

    public function __construct() {
        $this->db = new DataBase_class();
    }

    public function set_username($str) {
        $this->userName = $str;
    }

    public function set_password($str) {
        $this->password = $str;
    }

    public function get_username() {
        return $this->userName;
    }

    public function get_password() {
        return $this->password;
    }

    public function get_username_password($username, $password) {
        $query = "SELECT `user_name`, `password`, `type` FROM `users` WHERE `user_name` = '$username' AND   `password` = '$password'";
        if ($query_run = mysql_query($query)) {
            if (mysql_num_rows($query_run) == NULL) {
                return False;
            } else {
                $query_row = mysql_fetch_assoc($query_run);
                return $query_row;
            }
        } else {
            return False;
        }
    }

}

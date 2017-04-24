<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Instructor
 *
 * @author root
 */
class Instructor extends ApplicationUser {
    //put your code here
    public $position;
    public $degree;
    public $univerity = array();
    public $courses;


    public function __construct() {
        $this->courses = new ArrayObject(Course);
    }

    public function CreateCourse(){
        
    }
    
    public function AddMatrial(){
        
    }
    
    public function CreateQuiz(){
        
    }
    
    public function WriteDescription(){
        
    }
    
    public function AddTestCase(){
        
    }
    
    public function DropCourse($param) {
        
    }
    
    public function EditeQuiz(){
        
    }
    
    public function EditeCourse(){
        
    }
}

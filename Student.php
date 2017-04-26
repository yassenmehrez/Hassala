<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student
 *
 * @author root
 */
include_once 'DataBase.php';
include_once 'ApplicationUser.php';
include_once 'Course.php';
include_once 'Quiz.php';
include_once 'Question.php';
include_once 'Answer.php';
class Student extends ApplicationUser{
    
   public $college_id;
   public $rate;
   public $university;
   public $solved_problem;
   public $gender;
   public $profile_photo;
   public $courses = array();
   public $DB;
   
   public function __construct() {
      $this->DB = new DataBase();
   }


   public function PartcipateCourse($param) {
       
   }
   
   public function TakeQuiz($CourseName) {
       /****************
        * 
        * Select Course And Fill Data 
        * 
        ****************/
       $CourseID = $this->DB->getValueFromCoulmn("Course", "course_id", "course_name", $CourseName);
       $sql_query = "SELECT * FROM `Quiz` WHERE `course_id` = $CourseID";
       $quiz_query = $this->DB->database_query($sql_query);  
       $QuzArr = $this->DB->database_all_assoc($quiz_query);
       $Quiz = new Quiz();
       $quiz_id = $QuzArr[0]["quiz_id"];
       $Quiz->id = $quiz_id;
       $Quiz->title = $QuzArr[0]["title"];
       $Quiz->date = $QuzArr[0]["quiz_date"];
       $Quiz->time = $QuzArr[0]["quiz_time"];
       $Quiz->duration = $QuzArr[0]["quiz_duration"];
       $Quiz->description = $QuzArr[0]["description"];
       $Quiz->full_grade = $QuzArr[0]["quiz_full_mark"];
       /************
        * 
        * Select Questions to this quiz
        * 
        **************/
       
       $QuestionsQ = "SELECT * FROM `Question` WHERE `quiz_id` = $quiz_id ORDER BY RAND();";
       $QuesArr = $this->DB->database_all_assoc(
               $this->DB->database_query($QuestionsQ));
       for ( $i = 0; $i < count($QuesArr); $i++)
       {
           $qst = new Question();
           $QusID = $QuesArr[0]["question_id"];
           $qst->question_content = $QuesArr[0]["question_header"];
           $qst->correct_answer = $QuesArr[0]["question_model_answer"];
           $qst->question_grade = $QuesArr[0]["question_grade"];
           /*******
            * 
            * Select Answers to this Questions
            * 
            *******/
           $ansQu = " SELECT * FROM `question_answers` WHERE `question_id` = $QusID;";
           $AnsArr = $this->DB->database_all_assoc(
               $this->DB->database_query($ansQu));
           for ( $k = 0; $k < count($AnsArr); $k++)
           {
               $ans = new Answer();
               $ans ->answer = $AnsArr[0]["answer"];
               $ans ->count = $AnsArr[0]["chosen_count"];
               $qst->answers[]=($ans);
           }
           $Quiz->questions[] = $qst;
       }
       /***********
        *
        * Select Problems for this quiz
        *
        ***********/
       $ProblemQ = "SELECT * FROM `quiz_problem` WHERE `quiz_problem_id` = $quiz_id ORDER BY RAND();";
       $ProblemArr = $this->DB->database_all_assoc(
               $this->DB->database_query($ProblemQ));
       
       for ( $j = 0; $j < count($ProblemArr); $j++)
       {
           $prblm = new Problem_Quiz();
           $PrblmID = $QuesArr[0]["problem_id"];
           $prblm->Description= $ProblemArr[0]["description"];
           $prblm->input_format = $ProblemArr[0]["inputformat"];
           $prblm->output_format= $ProblemArr[0]["outputformat"];
           $prblm->grade = $ProblemArr[0]["problem_grade"];
           /*
            * 
            * Select Test Cases for this problem
            * 
            */
           $TestCaseQu = " SELECT * FROM `TestCase` WHERE `problem_quiz_id` = $PrblmID;";
           $TestCaseArr = $this->DB->database_all_assoc(
               $this->DB->database_query($TestCaseQu));
           for ($l = 0; $l < count($TestCaseArr); $l++)
           {
               $Tst = new TestCase();
               $Tst->input = $TestCaseArr[0]["input"];
               $Tst->output = $TestCaseArr[0]["output"];
               $prblm->test_case[] = $Tst;
           }
           $Quiz->problems[] = $prblm;
       }
       //Object finally filled
       return $Quiz;
   }
   
   public function RemoveCourse($param) {
       
   }
   
   public function DownloadMaterial($param) {
        
    }
    
   public function JoinContest($param) {
        
    }
    
   public function ScanQRcode($param) {
        
    }
    
   public function RateStudent($param) { /* bs na msh moktn3 bmkan el func de hen 
       ezai el student hyrate nfso logic 8alat*/
        
    }
   
   public function RateUniversity($param) {
        
    }
}

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
    
    public function CreateQuiz($Quiz, $CourseName)
    {
        $CourseID = $this->DB->getValueFromCoulmn("Course", "course_id", "course_name", $CourseName);
        $InstructorID = $this->DB->getValueFromCoulmn("Course", "instructor_id", "course_name", $CourseName);
        /*
         * Insert Data in Quiz Table 
         */
        $quiz_data = array (        
            "instructor_id" => $InstructorID,
            "course_id"     => $CourseID,
            "title"         => $Quiz->title,
            "quiz_date"     => $Quiz->date,
            "quiz_time"     => $Quiz->time,
            "quiz_duration" => $Quiz->duration,
            "description"   => $Quiz->description,
            "quiz_full_mark"=> $Quiz->$full_grade
        );
        $QuizID = $this->DB->insert("Quiz", $quiz_data);
        if($QuizID != FALSE) //Check that Quiz inserted
        {
            $Quiz->id = $QuizID;
            /*
             * insert Questions and there answers
             */
            for ($i = 0; $i < count($Quiz->questions); $i++) 
            {
                /*
                 * insert every Question data in quiz
                 */
                $Question = $Quiz->questions[$i];
                $question_data = array(
                    "question_header"       => $Question->question_content,
                    "question_model_answer" => $Question->correct_answer,
                    "quiz_id"               => $QuizID,
                    "question_grade"        => $Question->question_grade
                );
                $QuestionID = $this->DB->insert("Question", $question_data);
                if ($QuestionID != FALSE)//check that Question inserted
                {
                    $Question->question_id = $QuestionID;
                    for ($j = 0; $j < count($Question->answers); $j++)
                    {
                        /*
                         * insert every answer data 
                         */
                        $Answer = $Question->answers[$j];
                        $answer_data = array (
                            "question_id"      => $QuestionID,
                            "answer"           => $Answer->answer,
                            "chosen_count"     => 0
                        );
                       $answerID = $this->DB->insert("question_answers", $answer_data);
                    }
                }
            }
            /*
             * insert Problems and there test cases
             */
            for ($k = 0; $k < count($Quiz->problems); $k++) 
            {
                /*
                 * insert every Problem data in quiz
                 */
                $Problem = $Quiz->problems[$k];
                $problem_data = array(
                    "description"   => $Problem->Description,
                    "inputformat"   => $Problem->input_format,
                    "outputformat"  => $Problem->output_format,
                    "quiz_id"       => $QuizID,
                    "problem_grade" => $Problem->grade
                );
                $ProblemID = $this->DB->insert("quiz_problem", $problem_data);
                if ($ProblemID != FALSE)//check Problem inserted
                {
                    $Problem->problem_id = $QuestionID;
                    for ($l = 0; $l < count($Problem->test_case); $l++)
                    {
                        /*
                         * insert every testcase data 
                         */
                        $TC = $Question->answers[$l];
                        $test_case_data = array (
                            "input"      => $TC->input,
                            "output"     => $TC->output,
                            "problem_id" => $ProblemID
                        );
                       $TCID = $this->DB->insert("TestCase", $test_case_data);
                    }
                }
            }
        }
    }
    
    public function WriteDescription(){
        
    }
    
    public function AddTestCase(){
        
    }
    
    public function DropCourse($param) {
        
    }
    
    public function EditQuiz(){
        
    }
    
    public function EditCourse(){
        
    }
}

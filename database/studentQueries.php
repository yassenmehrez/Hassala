<?php
include_once realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .'initialize.inc.php');
class studentQueries{
	private $db;

	public function __construct(){

		$this->db = new DataBase();
	}

    public function reset_pass($username, $password, $id){
     $query = "UPDATE `users` SET `user_name` = '$username' , `password` = '$password' WHERE 
     `student_id` = '$id' ";
     mysql_query($query);
    }
    
    public function check_username($str){
      $result =  $this->db->check_rows('users','user_name',$str);
     return $result;
    }
     


     public function getStudent($qrString){
     $query = "SELECT * FROM `student` WHERE `qr_code_string` = '$qrString'";
        if($query_run = mysql_query($query)){
             if(mysql_num_rows($query_run)==NULL){
                  return False;
             } else{
               $query_row = mysql_fetch_assoc($query_run);
                   return $query_row;
              }
             } else {
                   return False;
               }
     }

	public function regester($Student, $id, $path){
    $data = array(); // to hold instructor table data
    $data1 = array(); // to hold user table data 
    
    $userName = $Student->get_username();
    $password = $Student->get_password();
 
    $result= $this->db->updateTable('student', $id , 'codeforces_handle', $Student->get_codeForces_handle());
    $result1 = $this->db->updateTable('student', $id, 'profile_photo', $path);
        
         $data1['student_id']    = $id;
         $data1['user_name']     = $userName;
         $data1['password']      = $password;
         $data1['type']          = 0;
         $res = $this->db->insert('users', $data1);
        
    }
	
	    public function getCourses($ID) {
        $Qry = "SELECT * FROM `student_course` WHERE std_id = $ID";
        $result = $this->db->database_query($Qry);
        if ($result) {
            $courses_ids = $this->db->database_all_assoc($result);
            $courses_arr = array();
            $courses = array();

            for ($i = 0; $i < count($courses_ids); $i++) {
                $CQry = "SELECT * FROM `Course` WHERE `course_id` = " . $courses_ids[$i]['crs_id'];
                $courses_arr[] = $this->db->database_all_assoc($this->db->database_query($CQry));



                for ($j = 0; $j < count($courses_arr); $j++) {
                    $crs = new Course();
                    $crs->description = $courses_arr[$j][$i]['course_description'];
                    $crs->name = $courses_arr[$j][$i]['course_name'];
                    $materialQry = "SELECT * FROM `Matrial` WHERE `course_matrial_id` = " . $courses_arr[$j][$i]['course_id'];
                    $materialArr = $this->db->database_all_assoc($this->db->database_query($materialQry));
                    for ($k = 0; $k < count($materialArr); $k++) {
                        $matrial = new Material();
                        $matrial->id = $materialArr[$k]['matrial_id'];
                        $matrial->path = $materialArr[$k]['path'];
                        $matrial->title = $materialArr[$k]['title'];
                        $crs->materials[] = $matrial;
                    }
                    $sql_query = "SELECT * FROM `Quiz` WHERE `course_id` =" . $courses_arr[$j][$i]['course_id'];
                    $quiz_query = $this->db->database_query($sql_query);
                    $QuzArr = $this->db->database_all_assoc($quiz_query);
                    for ($h = 0; $h < count($QuzArr); $h++) {


                        $Quiz = new Quiz();
                        $quiz_id = $QuzArr[$h]["quiz_id"];
                        $Quiz->id = $quiz_id;
                        $Quiz->title = $QuzArr[$h]["title"];
                        $Quiz->date = $QuzArr[$h]["quiz_date"];
                        $Quiz->time = $QuzArr[$h]["quiz_time"];
                        $Quiz->duration = explode(":", $QuzArr[$h]["quiz_duration"]);
                        $Quiz->description = $QuzArr[$h]["description"];
                        $Quiz->full_grade = $QuzArr[$h]["quiz_full_mark"];
                        /*                         * *********
                         * 
                         * Select Questions to this quiz
                         * 
                         * ************ */

                        $QuestionsQ = "SELECT * FROM `Question` WHERE `quiz_id` = $quiz_id;";
                        $QuesArr = $this->db->database_all_assoc(
                                $this->db->database_query($QuestionsQ));
                        for ($i = 0; $i < count($QuesArr); $i++) {
                            $qst = new Question();
                            $QusID = $QuesArr[$i]["question_id"];
                            $qst->question_id = $QusID;
                            $qst->question_content = $QuesArr[$i]["question_header"];
                            $qst->correct_answer = $QuesArr[$i]["question_model_answer"];
                            $qst->question_grade = $QuesArr[$i]["question_grade"];
                            /*                             * *****
                             * 
                             * Select Answers to this Questions
                             * 
                             * ***** */
                            $ansQu = " SELECT * FROM `question_answers` WHERE `question_id` = $QusID;";
                            $AnsArr = $this->db->database_all_assoc(
                                    $this->db->database_query($ansQu));
                            for ($k = 0; $k < count($AnsArr); $k++) {
                                $ans = new Answer();
                                $ans->answer = $AnsArr[$k]["answer"];
                                $ans->count = $AnsArr[$k]["chosen_count"];
                                $qst->answers[$k] = $ans;
                            }
                            $Quiz->questions[$i] = $qst;
                        }

                        /*                         * *********
                         *
                         * Select Problems for this quiz
                         *
                         * ********* */
                        $ProblemQ = "SELECT * FROM `quiz_problem` WHERE `quiz_id` = $quiz_id;";
                        $ProblemArr = $this->db->database_all_assoc(
                                $this->db->database_query($ProblemQ));
                        for ($j = 0; $j < count($ProblemArr); $j++) {
                            $problem = new Problem_Quiz();
                            $PrblmID = $ProblemArr[$j]["problem_id"];
                            $problem->problem_id = $PrblmID;
                            $problem->Description = $ProblemArr[$j]["description"];
                            $problem->input_format = $ProblemArr[$j]["inputformat"];
                            $problem->output_format = $ProblemArr[$j]["outputformat"];
                            $problem->grade = $ProblemArr[$j]["problem_grade"];
                            /*
                             * 
                             * Select Test Cases for this problem
                             * 
                             */
                            $TestCaseQuery = "SELECT * FROM `TestCase` WHERE `problem_id` = $PrblmID;";
                            $TestCaseArr = $this->db->database_all_assoc($this->db->database_query($TestCaseQuery));
                            for ($l = 0; $l < count($TestCaseArr); $l++) {
                                $Test_Case = new TestCase();
                                $Test_Case->input = $TestCaseArr[$l]["input"];
                                $Test_Case->output = $TestCaseArr[$l]["output"];
                                $problem->test_case[] = $Test_Case;
                            }
                            $Quiz->problems[] = $problem;
                        }
                    }
                    $crs->quizes[] = $Quiz;
                    return $crs;
                }
            }
        }
    }
}

?>

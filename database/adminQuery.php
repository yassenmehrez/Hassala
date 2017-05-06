<?php
include_once realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .'initialize.inc.php');
class Admin_Queries {

private $db; // object from DB class

public function __construct(){
 $this->db = new DataBase_Class();
}

	 public function Add_new_Student($Student){
        $data=array(); // array to hold student data
        $data['first_name']     =$Student->get_firstName();
        $data['last_name']      =$Student->get_lastName();
        $data['email']          =$Student->get_email();
        $data['college_id']     =$Student->get_college_id();        
        $data['gender']         =$Student->get_gender();
        $data['rate']           =$Student->get_rate();
        $data['university']     =$Student->get_univeristy();
        $data['qr_code_string'] =$Student->get_qr_code();
        //$data['user_type_id']=$applicationuser->get_user_type()->id;
        $result= $this->db->insert('student', $data);
        if($result){
            return TRUE;
        }
       else {
            return FALSE;
        }
    }

    public function check_email($email){
     $result =  $this->db->check_rows('student','email',$email);
     return $result;
    }

    public function genrate_stat(){
        $statistics_query = 'SELECT `university`,COUNT(`university`) as university_count FROM Student GROUP BY `university`';
        return $this->db->database_query($statistics_query);

    }

}
?>
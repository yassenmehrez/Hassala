<?php
include_once realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .'initialize.inc.php');
class studentQueries{
	private $db;

	public function __construct(){

		$this->db = new DataBase_Class();
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
}

?>
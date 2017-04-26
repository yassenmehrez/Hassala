<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author root
 */
include_once 'DataBase.php';
class Admin extends Person{
    //put your code here
    public $database;
    public function __construct() {
      $this->database = new DataBase();
   }
    public function CreateContest($param) {
        
    }
    
    public function AddStudent($param) {
        
    }
    
    public function AddIntialProblem($param) {
        
    }
    
    public function BackUp($param) {
        
    }   
    
    public function GenerateQRcode($param) {
        
    }
    
    public function GenerateStatistics() {
        $statistics_query = 'SELECT `university`,COUNT(`university`) as university_count FROM Student GROUP BY `university`';
        $qresult = $this->database->database_query($statistics_query);
        $result = array();
        while ($res = $qresult->fetch_assoc()){
            $result[] = $res;
        }
        $pie_chart_data = array();
        $pie_chart_data[] = array('Visitors','Numbers');
        foreach($result as $single_result){
            $pie_chart_data[] = array($single_result['university'],(int)$single_result['university_count']);
        }
        $pie_chart_data = json_encode($pie_chart_data);
        mysqli_free_result($qresult);
        return $pie_chart_data;
    }
}

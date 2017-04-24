<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.Contest
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        // put your code here
        include_once 'DataBase.php';
        include_once 'Student.php';
        
    /*    $mac = system('arp -an');
    echo $mac;*/
        $tryy = new DataBase();
       /* $student = array(
            
            
            "college_id"=>"3444",
            "first_name"=>"andrew",
            "last_name" =>"mina",
            "university"=>"hel",
            "rate"      =>"0",
            "email"     =>"nsskks",
            "solved_problems"=>"0",
            "profile_photo"=>"NULL",
            "gender"   =>"male",
            "codeforces_handle"=>"NULL",
            "qr_code_string"=>"sssd",
        );
        $obj;
        $query = "SELECT * FROM `Student` WHERE `college_id` LIKE '3444'";
        $obj = $tryy->get_row($query);
        
        foreach ($obj as $value2) {
            echo $value2 ;
            echo '<br>';*/
        /* print_r( $tryy->getLastValue("Student", "student_id"));
         
         print_r( $tryy->getValueFromCoulmn("Student", "first_name","student_id",2));*/
        
        /* $result= $tryy->database_query("Select `profile_photo` FROM Student WHERE 'student_id' = 6;");
         print_r($result);
         $arr=$tryy->database_all_assoc($result);
         print_r($arr);
         print_r( $arr[0]["profile_photo"]);
         //echo "$result[0]";
         //print_r($tryy);*/
        
        $s = new Student();
        $q = $s->TakeQuiz("sw");
        echo $q->id;
        echo $q->name   ;
        echo $q->questions->correct_answer;
        var_dump($q);
      
        ?>
    </body>
</html>

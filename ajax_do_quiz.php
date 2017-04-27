
<?php
include_once 'Person.php';
include_once 'ApplcationUser.php';
include_once 'Student.php';

include_once 'Quiz.php';
include_once 'Question.php';
include_once 'Answer.php';
include_once 'TestCase.php';
include_once 'Problem_Quiz.php';
include_once 'DataBase.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['str'])) {
    $student = new Student();
    $QUIZ = new Quiz();
    $CourseName = "Programming";
    $QUIZ = $student->TakeQuiz($CourseName);
    $str = explode('&&', $_POST['str']);
    $id = $str[0];
    $question_number = $id;
    $count = $str[1];
    $number_of_questions = $count;
    if ($id < $count) {
        if ($question_number < $number_of_questions) {
            ?>
            <div class="row">
                <div class="col-sm-8">
                    <h5>Question #<?php echo $question_number + 1; ?></h5>
                    <pre><?php echo $QUIZ->questions[$question_number]->question_content; ?></pre>
                </div>
                <div class="col-sm-4">
                    <h5>Grade : <?php echo $QUIZ->questions[$question_number]->question_grade; ?> Marks</h5>
                </div>
            </div><br>
            <?php
            $answers_count = count($QUIZ->questions[$question_number]->answers);
            echo '<div class="input-group">';
            for ($i = 0; $i < $answers_count; $i++) {
                echo '<label class="radio-inline">
                            <input type="radio" id="choose" name="optradio" value="' . $QUIZ->questions[$question_number]->answers[$i]->answer . '">';
                if ($QUIZ->questions[$question_number]->answers[$i]->answer != null) {
                    echo $QUIZ->questions[$question_number]->answers[$i]->answer;
                }
                echo '</label><br>';
            }
            echo '</div>';
        }
    } else {
        //Problem Info
        ?> 
            <div class ="row">
                <div class="col-sm-8">
                    <h5>Problem #<?php echo $problem_number;?></h5>
                    <pre>
                        <?php echo $QUIZ->problems[$problem_number]->Description?>
                    </pre>
                </div>
                <div class="col-sm-4">
                    <h5>Grade : <?php echo $QUIZ->problems[$problem_number]->grade;?> Marks</h5>
                </div>
            </div><br>
        <?php 
        //-------------------------------------
        //Input & Output format content 
        echo '<div class="form-group">';
        echo '<label for="input-format">Input format:</label>';
        echo '<p id="input-format">' . $QUIZ->problems[$problem_number]->input_format . '</p>';
        echo '<label for="output-format">Output format:</label>';
        echo '<p id="output-format">' . $QUIZ->problems[$problem_number]->output_format . '</p>';
        // Input & Output Examples
        $testCasesCount = count($QUIZ->problems[$problem_number]->test_case);
        for ($x = 0; $x < $testCasesCount; $x++) {
            echo '<label for="exampleInput">Example Input:</label>
                            <pre id="exampleInput">' . $QUIZ->problems[$problem_number]->test_case[$x]->input . '</pre>
                                <label for="exampleOutput">Example Output:</label>
                            <pre id="exampleOutput">' . $QUIZ->problems[$problem_number]->test_case[$x]->output . '</pre>';
            if ($testCasesCount > 1) {
                echo '<hr>';
            }
        }
        echo '</div>';
        // -------------------------------------
        //Answering problem text area
        echo '<label for="exampleTextarea">Please copy your code into the following textarea</label>
                                <textarea class="form-control" id="exampleTextarea" rows="30" style="resize:none;"></textarea>';
    }
}
?>
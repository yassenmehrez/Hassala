
<?php
include_once 'Person.php';
include_once 'ApplcationUser.php';
include_once 'Student.php';

include_once 'Quiz.php';
include_once 'Question.php';
include_once 'Answer.php';
include_once 'TestCase.php';
include_once 'Problem_Quiz.php';
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
    $count = $str[1];
    $problem_number = $str[2];
    $question_number = $id;
    $number_of_questions = $count;
    if ($id < $count) {
        if ($question_number < $number_of_questions) {
            ?>
            <div class="row">
                <div class="col-sm-8">
                    <h5>Question #<?php echo $question_number + 1; ?></h5>
                    <h5><pre><?php echo $QUIZ->questions[$question_number]->question_content; ?></pre></h5>
                </div>
                <div class="col-sm-4">
                    <h5>Grade : <?php echo $QUIZ->questions[$question_number]->question_grade; ?> Marks</h5>
                </div>
            </div>
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
                <h5>Problem #<?php echo $problem_number+1; ?></h5>
                <strong>
                    <pre><?php echo $QUIZ->problems[$problem_number]->Description; ?></pre>
                </strong>
            </div>
            <div class="col-sm-4">
                <h5>Grade : <?php echo $QUIZ->problems[$problem_number]->grade; ?> Marks</h5>
            </div>
        </div>
        <div class="form-group">
            <label for="input-format">Input format:</label>
            <p id="input-format"><?php echo $QUIZ->problems[$problem_number]->input_format; ?></p>
            <label for="input-format">Output format:</label>
            <p id="input-format"><?php echo $QUIZ->problems[$problem_number]->output_format; ?></p>
        </div>
        <?php
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
if (isset($_POST['solve_data'])) {
    $solve_data = explode('||', $_POST['solve_data']);
    $question_tracker = $solve_data[0];
    $total_number_of_questions = $solve_data[1];
    $total_attempts = $solve_data[2];
    ?> 
    <code>Question <?php echo $question_tracker; ?> of <?php echo $total_number_of_questions?></code>
    <br>
    <code>Total Attempts : <?php echo $total_attempts; ?></code><br>

    <?php
}
?>

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

$student = new Student();
$object = new DataBase();
$QUIZ = new Quiz();
$CourseName = "Programming";
$QUIZ = $student->TakeQuiz($CourseName);
print_r($QUIZ->questions->answers);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>EXAMINATION FORM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/do_quiz_css/do_quiz_stylesheet.css">
        <script src="js/do_quiz_js/countdown.js"></script>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <!---<script src="ajax_file.js"></script>--->

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!--  Content Area-->
        <div class="container">
            <h1>EXAMINATION FORM <small>powered by Hassala FCI | All rights reserved</small></h1>
            <hr>
            <h4 style="text-decoration: underline;"><center><?php echo $QUIZ->title; ?></center></h4>
            <h5>Quiz Description:</h5> 
            <?php
            echo '<div class = "row">
                        <div class = "col-sm-8">' . '<pre>' . $QUIZ->description . '</pre>' . '</div>
                        <div class = "col-sm-4"><table class="table">
                                              <thead class="thead-inverse">
                                                <tr>
                                                <th>Full Grade</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                <td>' . $QUIZ->full_grade . ' Marks</td>
                                                    </tr>
                                                    </table></div>
                        </div>';
            ?>
            <br>
            <!--------- Countdown Timer ----->
            <div id='timer'>
                <?php
                echo '<script type="text/javascript">var timer=' . $QUIZ->duration[1] * 60 . '</script>';
                ?>
                <script src="js/do_quiz_js/do_quiz_timer.js?" type="text/javascript"></script>      
            </div>
            <!-------------------------------->
            <!---------- Quiz Form ------->
            <form action=""method="POST" id="quiz-form">
                <!---------Filling QUIZ questions---->
                <?php
                //defines the question number in quesitons array
                $question_number = 3;
                //total number of questions in the array
                $number_of_questions = count($QUIZ->questions);
                //defines the problem number in problems array
                $problem_number = 1;
                //total number of problem in the array
                $number_of_problems = count($QUIZ->problems);
                //questions tracker to tell student which question is he solving ATM
                $question_tracker = 1;
                //total numbers of questions ( questions + problems )
                $total_number_of_questions = $number_of_problems + $number_of_questions;
                //total number of questions which are answered
                $total_attempts = 0;
                ?>
                <div id="design-indent">
                    <?php
                    if ($question_number < $number_of_questions) {
                        //<!----- Question Header & Grade-->
                        echo '<div class = "row">
                        <div class = "col-sm-8"><h5>Question #' . $question_number . '<h5>'
                        . '<pre>' . $QUIZ->questions[$question_number]->question_content . '</pre></div>
                        <div class = "col-sm-4"><h5>Grade : ' . $QUIZ->questions[$question_number]->question_grade . ' Marks</h5></div>
                        </div ><br>';
                        $answers_count = count($QUIZ->questions[$question_number]->answers);
                        echo '<div class="input-group">';
                        for ($i = 0; $i < $answers_count; $i++) {
                            echo '<label class="radio-inline">
                            <input type="radio" name="optradio" value="">';
                            if ($QUIZ->questions[$question_number]->answers[$i]->answer != null)
                                echo $QUIZ->questions[$question_number]->answers[$i]->answer;
                            echo '</label><br>';
                        }
                        echo '</div>';
                    } else {
                        //Problem Info
                        echo '<div class = "row">
                        <div class = "col-sm-8"><h5>Problem #' . $problem_number . '<h5><br><pre>' . $QUIZ->problems[$problem_number]->Description . '</pre></div>
                        <div class = "col-sm-4"><h5>Grade : ' . $QUIZ->problems[$problem_number]->grade . ' Marks</h5></div>
                        </div><br>';
                        //-------------------------------------
                        //Input & Output format content 
                        echo '<div class="form-group">';
                        echo '<label for="input-format">Input format:</label>';
                        echo '<p id="input-format">' . $QUIZ->problems[$problem_number]->input_format . '</p>';
                        echo '<label for="output-format">Output format:</label>';
                        echo '<p id="output-format">' . $QUIZ->problems[$problem_number]->output_format . '</p>';
                        // Input & Output Examples
                        $testCasesCount = count($QUIZ->problems[$problem_number]->test_case);
                        for ($x = 0; $x < $testCasesCount; $x++) {;
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
                    ?>
                    <!--------------------------------->
                    <br>
                    <!------NEXT & PREVIOUS Buttons --->
                    <?php
                    if ($question_tracker <= 1) {
                        echo '<button disabled="disabled" type="button" class="next btn btn-primary">Previous</button> ';
                    } elseif ($question_tracker > 1) {
                        echo '<button type="button" class="next btn btn-primary">Previous</button> ';
                    }
                    echo '<button type="button" class="previous btn btn-primary">Next</button><br>';
                    ?>
                    <!------------------------->
                    <!---Questions Information --->
                    <code>Question </code>
                    <?php
                    echo '<code>' . $question_tracker . ' </code>';
                    ?>
                    <code>of </code>
                    <?php
                    echo '<code>' . $total_number_of_questions . '</code>'
                    ?>
                    <br>
                    <code>Total Attempts : <?php echo $total_attempts; ?></code><br>
                    <!---------------------->
                    <!---- Submit Button --->
                    <button type="submit" class="btn btn-primary" id="submit-button">I'M DONE, SUBMIT TEST</button>
                    <p id="caution-paragraph">Do not go to any other page, your data may be lost!</p>
                </div>
            </form>
            <!----- End of form ------>
        </div>

    </body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $variable = $_POST['optradio'];
    echo $variable;
}
$student = new Student();
$student = $_SESSION['Student'];
$object = new DataBase();
?>
<?php
require 'DataBase.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>EXAMINATION FORM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/stylesheet.css">
        <script src="countdown.js"></script>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <!---<script src="ajax_file.js"></script>--->

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!--  Content Area-->
        <div class="container">
            <h1>EXAMINATION FORM <small>powered by Hassala FCI | All rights not reserved</small></h1>
            <hr>
            <!--------- Countdown Timer ----->
            <div id='timer'>
                <?php
                echo '<script type="text/javascript">' . $quiz->duration . '</script>';
                ?>
                <script src="do_quiz_timer.js?"type="text/javascript"></script>      
            </div>
            <!-------------------------------->
            <pre>
            <h5>Quiz Description:</h5> 
                <?php
                echo $quiz->description;
                ?>
            </pre>
            <br>
            <!---------- Quiz Form ------->
            <form action=""method="POST" id="quiz-form">
                <!---------Filling QUIZ questions---->
                <?php
                $QUIZ = new Quiz();
                $QUIZ = $student->TakeQuiz($CourseName);
                //defines the question number in quesitons array
                $question_number = 1;
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
                ?>
                <?php
                ?>
                <div id="design-indent">
                    <?php
                    if ($question_number < $number_of_questions) {
                        //<!----- Question Header & Grade-->
                        echo '<div class = "row">
                        <div class = "col-sm-8"><h5>Question #' . $question_number . '<h5><br><p>' . $QUIZ->questions[$question_number]->question_content . '</p></div>
                        <div class = "col-sm-4">' . $QUIZ->questions[$question_number]->question_grade . '</div>
                        </div ><br>';
                        $answers_count = count($QUIZ->questions[$question_number]->$answers);
                        echo '<div class="input-group">';
                        for ($i = 0; $i < $answers_count; $i++) {
                            echo '<label class="radio-inline">
                            <input type="radio" name="optradio" value="{$i+1}">';
                            echo $QUIZ->questions[$question_number]->answers[$i];
                            echo '</label><br>';
                        }

                        echo '</div>';
                    } else {
                        //Problem Info
                        echo '<div class = "row">
                        <div class = "col-sm-8"><h5>Problem #' . $problem_number . '<h5><br><p>' . $QUIZ->problems[$problem_number]->Description . '</p></div>
                        <div class = "col-sm-4">' . $QUIZ->problems[$problem_number]->grade . '</div>
                        </div ><br>';
                        //-------------------------------------
                        //Input & Output format content 
                        echo '<div class="form-group>"';
                        echo '<label for="input-format">Input format:</label>';
                        echo '<p id="input-format">' . $QUIZ->problems[$problem_number]->input_format . '</p>';
                        echo '<label for="output-format">Output format:</label>';
                        echo '<p id="output-format">' . $QUIZ->problems[$problem_number]->output_format . '</p>';
                        // Input & Output Examples
                        $testCasesCount = count($QUIZ->problems[$problem_number]->test_case);
                        for ($x = 0; $x < testCasesCount; $x++) {
                            echo '<label for="exampleInput">Example Input:</label>
                            <textarea class="form-control" id="exampleInput" rows="5" style="resize:none;" disabled>' . $QUIZ->problems[$problem_number]->test_case[$j]->input . '</textarea>
                                <label for="exampleOutput">Example Output:</label>
                            <textarea class="form-control" id="exampleOutput" rows="5" style="resize:none;" disabled>' . $QUIZ->problems[$problem_number]->test_case[$j]->output . '</textarea>';
                            if ($testCasesCount > 1)
                                echo '<hr>';
                        }
                        echo '</div>';
                        // -------------------------------------
                        //Answering problem text area
                        echo '<label for="exampleTextarea">Please copy your code into the following textarea</label>
                                <textarea class="form-control" id="exampleTextarea" rows="30" style="resize:none;"></textarea>';
                    }
                    ?>
                    <!------------------------>
                    <br>
                    <!------NEXT & PREVIOUS Buttons --->
                    <?php
                    if ($question_tracker <= 1) {
                        echo '<button disabled="disabled" type="button" class="next btn btn-primary">Previous</button> ';
                        echo '<button type="button" class="previous btn btn-primary">Next</button><br>';
                    } elseif ($question_tracker > 1) {
                        echo '<button type="button" class="next btn btn-primary">Previous</button> ';
                        echo '<button type="button" class="previous btn btn-primary">Next</button><br>';
                    }
                    ?>
                    <!------------------------->
                    <!---Questions Information --->
                    <code>Question </code>
                    <?php
                    echo '<code>' . $question_tracker . ' </code>';
                    ?>
                    <code>Of </code>
                    <?php
                    echo '<code>' . $total_number_of_questions . '</code>'
                    ?>
                    <br>
                    <code>Total Attempts:</code><br>
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

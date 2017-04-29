<?php
session_start();
if (isset($_SESSION['Student']) || $_SESSION['Student'] == null) {
    include_once 'Person.php';
    include_once 'ApplicationUser.php';
    include_once 'Student.php';
    include_once 'Quiz.php';
    include_once 'Question.php';
    include_once 'Answer.php';
    include_once 'TestCase.php';
    include_once 'Problem_Quiz.php';
    $student = new Student();
    $QUIZ = new Quiz();
    $CourseName = "Programming";
    $QUIZ = $student->TakeQuiz($CourseName);
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>EXAMINATION FORM</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="libraries/bootstrap-3.3.7-dist/css/bootstrap.css">
            <link rel="stylesheet" href="/css/do_quiz_css/do_quiz_stylesheet.css">
            <script src="js/do_quiz_js/countdown.js"></script>
            <script src="js/do_quiz_js/on_active.js"></script>
            <script src="libraries/jquery 1.12.1.min.js"></script>

            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
            <!---<script src="ajax_file.js"></script>--->

            <!-- Latest compiled JavaScript -->
            <script src="libraries/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        </head>
        <body>
            <!--  Content Area-->
            <div class="container">
                <h1>EXAMINATION FORM <small>powered by Hassala FCI | All rights reserved</small></h1>
                <hr>
                <h4 style="text-decoration: underline;"><center><?php echo $QUIZ->title; ?></center></h4>
                <p style="color:red;"><strong>CAUTION:</strong> Switching to any other tab than <strong>quiz's</strong> tab will be considered as cheating and your answers will be submitted automatically.</p>
                <h5>Quiz Description:</h5> 
                <!------- QUIZ DESCRIPTION ----->
                <div class="row">
                    <div class="col-sm-8">
                        <pre><?php echo $QUIZ->description ?></pre>
                        <!--------- Countdown Timer ----->
                        <div id='timer'>
                            <?php
                            echo '<script type="text/javascript">timer=' . $QUIZ->duration[1] * 60 . '</script>';
                            ?>
                            <script src="js/do_quiz_js/do_quiz_timer.js" type="text/javascript"></script>      
                        </div>
                        <!-------------------------------->
                    </div>
                    <!----QUIZ GRADE ----------->
                    <div class = "col-sm-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Full Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $QUIZ->full_grade; ?> Marks
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!---------- Quiz Form ------->
                <form action="" method="POST" role="form" id="quiz-form">
                    <!---------Filling QUIZ questions---->
                    <?php
                    //defines the question number in quesitons array
                    $question_number = 0;
                    //total number of questions in the array
                    $number_of_questions = count($QUIZ->questions);
                    //defines the problem number in problems array
                    $problem_number = 0;
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
                        <div id="question-form">
                            <?php
                            if ($question_number < $number_of_questions) {
                                //<!----- Question Header & Grade-->                           
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
                                ?> 
                                <!--- Beginning of input radio buttons--->
                                <div class="input-group">
                                    <?php
                                    for ($i = 0; $i < $answers_count; $i++) {
                                        echo '<label class="radio-inline">
                            <input type="radio" id="choose" name="optradio" value="' .
                                        $QUIZ->questions[$question_number]->answers[$i]->answer . '">';
                                        if ($QUIZ->questions[$question_number]->answers[$i]->answer != null) {
                                            echo $QUIZ->questions[$question_number]->answers[$i]->answer;
                                        }
                                        echo '</label><br>';
                                    }
                                    echo '</div>';
                                } elseif ($number_of_problems != 0) {
                                    //Problem Info
                                    ?> 
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h5>Problem #<?php echo $problem_number + 1; ?></h5>
                                            <strong><pre><?php echo $QUIZ->problems[$problem_number]->Description; ?></pre></strong>
                                        </div>
                                        <div class="col-lg-4">
                                            <h5>Grade : <?php echo $QUIZ->problems[$problem_number]->grade; ?> Marks</h5>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-format">Input format:</label>'
                                        <p id="input-format"><?php $QUIZ->problems[$problem_number]->input_format ?></p>
                                        <label for="input-format">Output format:</label>'
                                        <p id="input-format"><?php $QUIZ->problems[$problem_number]->output_format ?></p>
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
                                <textarea class="form-control" id="exampleTextarea" rows="30" style="resize:none;font-family: courier new;"></textarea>';
                                }
                                ?>
                            </div>
                            <!--------------------------------->
                            <br>
                            <!------NEXT & PREVIOUS Buttons --->
                            <button disabled="disabled" type="button" class="previous btn btn-primary" onclick="get_previous_question()">Previous</button> 
                            <button type="button" class="next btn btn-primary" onclick="get_next_question()">Next</button>
                            <!-------------------------->
                            <br>
                            <br>
                            <!------------------------->
                            <!---Questions Information --->
                            <div id="question-data">
                                <code>Question <?php echo $question_tracker; ?> of <?php echo $total_number_of_questions ?></code>
                                <br>
                                <code>Total Attempts : <?php echo $total_attempts; ?></code><br>
                            </div>
                            <!---------------------->
                        </div>

                        <!---- Submit Button --->
                        <button type="submit" class="btn btn-primary" id="submit-button" name="submit-quiz">I'M DONE, SUBMIT TEST</button>
                        <p id="caution-paragraph">Do not go to any other page, your data may be lost!</p>       
                    </div>
                    <!----- End of form ------>
                </form>
        </body>
        <input type="hidden" id="last_q" value="1">
        <input type="hidden" id="count" value="<?php echo $number_of_questions; ?>">
        <input type="hidden" id="last_p" value="1">
        <input type="hidden" id="total_questions" value="<?php echo $total_number_of_questions; ?>">
        <input type="hidden" id="question_tracker" value="<?php echo $question_tracker + 1; ?>">
        <input type="hidden" id="total_attempts" value="0">
        <input type="hidden" id="count_problems" value="<?php echo $number_of_problems;?>">
    </html>

    <script>
        function get_next_question() {
            var last_q = $("#last_q").val();
            var count = $("#count").val();
            var count_problems = $("#count_problems").val();
             
            if (last_q === count)
                var last_p = "0";
            else
                var last_p = $("#last_p").val();
            var str = last_q + "&&" + count + "&&" + last_p + "&&" + count_problems;
            $.post('ajax_do_quiz.php', {
                str: str
            }, function (html) {
                $("#question-form").empty();
                $("#question-form").append(html);

                if (last_q <= count) {
                    var x = parseInt(last_q);
                    $("#last_q").val(x + 1);
                }

                if (last_q >= count) {
                    var y = parseInt(last_p);
                    $("#last_p").val(y + 1);
                }
                $(".previous").attr("disabled", false);
            });
            var question_tracker = $("#question_tracker").val();
            var total_questions = $("#total_questions").val();
            var total_attempts = $("#total_attempts").val();
            var solve_data = question_tracker + "||" + total_questions + "||" + total_attempts;
            $.post('ajax_do_quiz.php', {
                solve_data: solve_data
            }, function (html2) {
                $("#question-data").empty();
                $("#question-data").append(html2);
                var y = parseInt(question_tracker);
                $("#question_tracker").val(y + 1);
                if (question_tracker === total_questions)
                    $(".next").attr("disabled", true);
                console.log(last_q);
                console.log(last_p);
                console.log(count);
            });
            

        }
        function get_previous_question() {
            var count = $("#count").val();
            var last_q = $("#last_q").val();
            if(count <= last_q){
                var last_q = parseInt($("#last_q").val())-2;
            }
            var last_p = $("#last_p").val();
            
            
            var str = last_q + "&&" + count + "&&" + last_p;
            $.post('ajax_do_quiz.php', {
                str: str
            }, function (html) {
                $("#question-form").empty();
                $("#question-form").append(html);
            });
            
            
            
            //------------------------
            var question_tracker = parseInt($("#question_tracker").val())-2;
            var total_questions = $("#total_questions").val();
            var total_attempts = $("#total_attempts").val();
            var solve_data = question_tracker + "||" + total_questions + "||" + total_attempts;
            $.post('ajax_do_quiz.php', {
                solve_data: solve_data
            }, function (html2) {
                $("#question-data").empty();
                $("#question-data").append(html2);
                var y = parseInt(question_tracker);
                $("#question_tracker").val(y + 1);
                if (question_tracker =="1")
                    $(".previous").attr("disabled", true);

            });

        }
    </script>
<?php
} else {
    include_once 'index.php';
    header("Location : index.php");
}


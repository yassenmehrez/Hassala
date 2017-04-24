<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $variable = $_POST['optradio'];
    echo $variable;
}
$object = new DataBase();
$quiz = new Quiz();
$quiz = $object->TakeQuiz("");
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
            <!---------- Question Form ------->
            <form action=""method="POST" id="question-form">
                <div id="design-indent">
                    <h5>Question #</h5>
                    <!----- Question Header -->
                    <p>
                        <?php 
                        ?>
                    </p>
                    <!------------------------>
                    <div class="input-group">
                        <label class="radio-inline">
                            <input type="radio" name="optradio" value="A">Andrew
                        </label><br>
                        <label class="radio-inline">
                            <input type="radio" name="optradio" value="B">Option2
                        </label><br>
                        <label class="radio-inline">
                            <input type="radio" name="optradio" value="C">Option3
                        </label><br>
                        <label class="radio-inline">
                            <input type="radio" name="optradio" value="D">Option2
                        </label><br>
                        <label class="radio-inline">
                            <input type="radio" name="optradio" value="C">Option3
                        </label>
                    </div>
                    <br>

                    <button type="button" class="next btn btn-primary">Previous</button>
                    <button type="button" class="previous btn btn-primary">Next</button><br>
                    <!---Questions Information --->
                    <code>Question</code>
                    <?php
                    ?>
                    <code>Of</code>
                    <?php
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

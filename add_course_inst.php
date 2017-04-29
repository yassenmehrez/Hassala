<?php
session_start();
include_once 'Instructor.php';
include_once 'Course.php';
include_once 'Material.php';

if (isset($_SERVER['Instructor']) || $_SERVER['Instructor'] == NULL) {
    $instructor = new Instructor();
    $instructor = $_SERVER['Instructor'];
    if (isset($_POST['submit_course'])) {
        $course = new Course();
    }
    ?>
    <!DOCTYPE html>

    <html>
        <head>
            <title>Courses</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="libraries/bootstrap-3.3.7-dist/css/bootstrap.css">
            <script src="libraries/jquery 1.12.1.min.js"></script>
            <script src="js/add_course_inst_js/add_course.js"></script>
            <script src="libraries/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        </head>
        <body>
            <div class = "container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Description</th>
                            <th>Material</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary" id ="add_course">Add Course</button>
                <button class="btn btn-primary" id ="drop_course">Drop Course</button>

                <br>
                <br>
                <div>
                    <form method="POST" id="course_form" style="display: none;">
                        <label for="course_name" class="col-2 col-form-label">Course Name</label>

                        <input class="form-control" type="text" id="course_name" name="course_name" required="True">

                        <label for="Textarea">Course Description</label>

                        <textarea class="form-control" id="Textarea" rows="3" required="True" name ="description"></textarea>

                        <label for="material_title" class="col-2 col-form-label" >Material Title</label>

                        <input class="form-control" type="text" id="material_title" required="True" name ="material_title">

                        <label for="material_url" class="col-2 col-form-label">Material URL</label>

                        <input class="form-control" type="url" id="material_url" required="True" name="material_url">
                        <br>
                        <button class="btn btn-primary" type="submit" name="submit_course">Submit</button>
                    </form>
                </div>  
        </body>
    </html>
<?php
} else {
    header('Location: index.php');
}
?>
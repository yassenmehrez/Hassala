<?php ?>
<!DOCTYPE html>

<html>
    <head>
        <title>Courses</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="libraries/bootstrap-3.3.7-dist/css/bootstrap.css">
        <script src="libraries/jquery 1.12.1.min.js"></script>
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

            <div class="form-group row">
                <label for="course_name" class="col-2 col-form-label">Course Name</label>
                <div class="col-10">
                    <input class="form-control" type="text" value="" id="course_name">
                </div>
            </div>
            <div class="form-group row">
                <label for="Textarea">Course Description</label>
                <div class="col-10">
                    <textarea class="form-control" id="Textarea" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="material_title" class="col-2 col-form-label">Material Title</label>
                 <div class="col-10">
                     <input class="form-control" type="text" value="" id="material_title">
                </div>
            </div>
            <div class="form-group row">
                <label for="material_url" class="col-2 col-form-label">Material URL</label>
                <div class="col-10">
                    <input class="form-control" type="url" value="" id="material_url">
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>  
    </body>
</html>
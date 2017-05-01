<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="libraries/jquery 1.12.1.min.js"></script>
        <link rel="stylesheet" href="libraries/bootstrap-3.3.7-dist/css/bootstrap.css">
    </head>
    <body>
        <div class="container">
            <?php
            $url = 'http://codeforces.com/api/problemset.problems?tags=implementation';
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, $url);
            $problem_set = json_decode(curl_exec($curl));
            @curl_close($curl);
            $problem_count = count($problem_set->result->problems);
            ?>
            
            <table class="table">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Problem Name</th>
                        <th>Online Judge</th>
                        <th>Contest</th>
                        <th>Difficulty Level</th>
                        <th>Solved Count</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < $problem_count; $i++) {
                        $problem_url = 'http://codeforces.com/problemset/problem/' . $problem_set->result->problems[$i]->contestId . '/' .
                                $problem_set->result->problems[$i]->index;
                        echo '<tr>
                        <th scope="row">' . $i . '</th>
                        <td><a href="'. $problem_url .'">' . $problem_set->result->problems[$i]->name . '</a></td>
                        <td>Code Forces</td>
                        <td>' . $problem_set->result->problems[$i]->contestId . '</td>
                        <td>' . $problem_set->result->problems[$i]->index . '</td>
                        <td>x' . $problem_set->result->problemStatistics[$i]->solvedCount . '</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

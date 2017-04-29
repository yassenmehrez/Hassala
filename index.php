<?php 
include_once 'DataBase.php';
include_once 'Person.php';
include_once 'ApplicationUser.php';
include_once 'Admin.php';
$admin = new Admin();
$result = $admin->GenerateStatistics();
?>
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
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $result;?>);
        

        var options = {
          title: 'Encounting users from each university.',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    </head>
    <body>
        
       <div id="piechart" style="width: 900px; height: 500px;"></div>
    </body>
</html>

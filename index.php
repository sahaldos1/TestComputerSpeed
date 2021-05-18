<?php

    require 'connection.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Computer Speed</title>

    <link rel="stylesheet" href="stylesheets/style.css" />


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

</head>
<body>


    

    <div class="container">

    <nav class="navbar navbar-light bg-light">
        <a href="https://www.couple.com/" class="navbar-brand">
            <img src="images/Couple-Logo.png" style="height:50px;" alt="CoupleBrand">
        </a>
        
    </nav>

      <div class="main-content">

      <div class="intro">
          <h3>Check out your computer's capabilities below!</h3>
          <p>Click the 'Start Test' button, wait 15 seconds and you'll have your result!</p>
          <p>To view previous results from other people like you, click the 'Show Previous Results' button</p>
      </div>
        

        <div class="buttons">
        <button type="button" id="start-button" class="button">
          Start Test
        </button>

        <button type="button" id="results-button" class="button" onclick="">
          Show Previous Results
        </button>
        </div>

        <h3 id="result">Result:</h3>

        

        <div class="container" id="table-container">
        <div class="row" id="table-row">

            <h3 style="text-align:left" >Recent Results</h3>

            <div id="table-div" class="col-md-8">

                <table class="table table-hover table-bordered">
                <thead >
                  <tr>
                    <th scope="col">DateTime</th>
                    <th scope="col">Score</th>
                    <th scope="col">IP</th>
                    <th scope="col">OS</th>
                    <th scope="col">Browser</th>
                    <th scope="col">CPU Cores</th>
                    <th scope="col">RAM</th>
                    <th scope="col">Download Speed</th>
                    <th scope="col">Round Trip Latency</th>
                  </tr>
                </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
      </div>

      
    </div>

    

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/app.js"></script>

    

    
    
    <script type="text/javascript">
        $("#results-button").click(function () {
           getData('getResults');
        });

        function getData(key) {
            $.ajax({
               url:'ajax.php',
               method: 'POST',
               dataType: 'text',
               data: {
                   key: key
               }, success: function (response) {

                if (document.getElementById("table-container").style.display === "none"){
                    document.getElementById("table-container").style.display="block";
                    document.getElementById("table-div").style.display="block";
                } else {
                    document.getElementById("table-container").style.display="none";
                    document.getElementById("table-div").style.display="none";
                }


                   if (key == 'getResults'){
                    $("tbody").children().remove()

                       
                    $('tbody').append(response);
                   }
                       
               }
            });
        }

        function showData(key) {
            $.ajax({
               url:'ajax.php',
               method: 'POST',
               dataType: 'text',
               data: {
                   key: key
               }, success: function (response) {

                   if (key == 'getResults'){
                    $("tbody").children().remove()

                       
                    $('tbody').append(response);
                   }
                       
               }
            });
        }

       
    </script>
</body>
</html>
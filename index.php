<?php

    require 'connection.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" />
    <title>Test Computer Speed</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    

    <div class="container">
      <div class="main-content">
        <button type="button" id="start-button" class="button">
          Start Test
        </button>

        <h3 id="result">Result:</h3>

        <button type="button" id="results-button" class="button" onclick="">
          Show Previous Results
        </button>
      </div>
    </div>

    <div class="container" id="table-container" style="margin-top: 20px;">
        <div class="row">

            <div id="table-div" class="col-md-8">

                <table class="table table-hover table-bordered displaytable">
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

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="app.js"></script>

    <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
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

        function showResults(){
            if (document.getElementById("displaytable").style.display === "none"){
                document.getElementById("displaytable").style.display="block";
            } else {
                document.getElementById("displaytable").style.display="none";
            }
        }
    </script>
</body>
</html>
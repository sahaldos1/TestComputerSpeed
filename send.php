<?php

require 'connection.php';


  $dateTime = $_POST['dateTime'];
	$score = $_POST['score'];
	$ipAddress = $_POST['ipAddress'];
	$os = $_POST['os'];
	$browser = $_POST['browser'];
	$cores = $_POST['cores'];
	$ram = $_POST['ram'];
	$downloadSpeed = $_POST['downloadSpeed'];
  $latency = $_POST['latency'];
  
  

  $sql = "INSERT INTO records (DATE_TIME, Score, IP, OS, Browser, CPU_Cores, Ram, Download_Speed, latency) VALUES (
    '$dateTime',
      '$score',
      '$ipAddress',
      '$os',
      '$browser',
      '$cores',
      '$ram',
      '$downloadSpeed',
      '$latency'
  );";
  

  $conn->query($sql);


	

  


?>
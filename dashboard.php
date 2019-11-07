<?php

include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

 

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/scrolling-nav.css" rel="stylesheet">

<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
    <style>
        .form{
            font-family: monospace;
            margin-top: 8%;
            margin-left: 0;
            padding: 1%;
            background-color: #17150E;
            color: white;
        }
    </style>
</head>
<body>
    <?php
	require('db.php');
	//session_start();
    // If form submitted, insert values into the database.
    if (isset($_SESSION['username'])){
		
		$username = stripslashes($_SESSION['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		
		
	//Checking is user existing in the database or not
        $query = "SELECT MAX(ua.occurrence) FROM user_activity ua,activity a,user u WHERE ua.user_id=u.id AND ua.activity_id = a.id AND u.name='$username' AND a.name ='login' GROUP BY activity_id,user_id";
		$result = mysqli_query($con,$query) or die(mysql_error());
		if($result !=null){
             while ($row = mysqli_fetch_assoc($result))
                {
                    echo "<div class='form'><h5>You last LoggdIn on</h5>{$row['MAX(ua.occurrence)']}</div>";
                }
        }
        else{
             echo "<div class='form'><h5>It's Your first Visit..! Welcome to KLF Group.</h5></div>";
        }
        
			
			
    }else{}
 function lastLogin($row){
        extract($row);
        echo "<div class='form'><h5>You last LoggdIn on</h5>$text</div>";
        
    }
?>
     <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="images/brand_image.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger mr-3" href="#profile">Welcome <?php echo $_SESSION['username']; ?>!</a>
          </li>
          
            <li class="nav-item">
            <a class="nav-link js-scroll-trigger btn btn-outline-dark p-2" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>
</html>


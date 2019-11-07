

<?php

 
require('db.php');
 //include auth.php file on all secure pages ?>
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
<title>KLF Group - Home</title>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* Style inputs */
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Style the container/contact section */
.container {
  border-radius: 5px;
  align-content: center;
  padding: 10px;
}

/* Create two columns that float next to eachother */
.column {
  
  width: 50%;
  margin-top: 6px;
margin-left: 25%;
  padding: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="images/brand_image.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>
          <li class="nav-item mr-3">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
            <li class="nav-item">
            <a class="nav-link js-scroll-trigger btn btn-outline-dark p-2" href="login.php">LOGIN</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="header bg-dark">
    <div class="text-center">
      <img src="images/5-rocks-celebration.jpg">
    </div>
  </header>

  <section id="about">
    <div class="container text-success">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>About KLF Group</h2>
          <p class="lead">The KLF Group is a Canadian company specializing in software development and logistics for employee recognition and customer loyalty programs. KLF’s suite of services help companies implement, improve, and reduce the cost of operating their reward programs. Services include:
   </p>
          <ul>
            <li>Employee engagement software.</li>
            <li>Integrated rewards marketplace.</li>
            <li>Reward sourcing and fulfillment.</li>
            <li>Third-party logistics.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="bg-success">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>CORE SERVICES we offer</h2>
          <p class="lead">WE PROVIDE END-TO-END SOLUTIONS FROM EMPLOYEE ENGAGEMENT SOFTWARE DEVELOPMENT TO LAST-MILE REWARD LOGISTICS.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
      <div class="container">
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p>Leave us a message:</p>
  </div>
  <div class="row">
  
    <div class="column">
      <form action="" method="post">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">
          <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your Last name..">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Your E-mail Id..">
          
        
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</div>
  </section>
<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['firstname'])){
		$firstname = stripslashes($_REQUEST['firstname']); // removes backslashes
		$firstname = mysqli_real_escape_string($con,$firstname); //escapes special characters in a string
		$lastname = stripslashes($_REQUEST['lastname']);
		$lastname = mysqli_real_escape_string($con,$lastname);
		$subject = stripslashes($_REQUEST['subject']);
		$subject = mysqli_real_escape_string($con,$subject);
        $email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);

		
        $query = "INSERT into `contact` (firstname, lastname, email, subject) VALUES ('$firstname', '$lastname', '$email', '$subject')";
        $result = mysqli_query($con,$query);
        if($result){
           function_alert("We got your messege, We'll get back to you soon..!");
 }
    }else{
                function_alert("Somthing wrong please fiil out contact form again.!");

    }
    function function_alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>

</body>/body>
</html>

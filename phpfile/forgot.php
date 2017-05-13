<?php
  session_start();
  include "adb.php";
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    	$email = $_POST['email'];
      $myArray = explode('@', $email);
			if ($myArray[1] != "drexel.edu"){
				echo "<script>alert('Please enter your Drexel email address')</script>";
			}
      else{
        //... code to send password reset...
      }

?>



<html lang = "en">
<html>
<head>
 	<meta charset="utf-8">
 	<meta name = "viewport" content="width=device-wdith, initial-scale=1">
 	<title>Login</title>
 	<meta name = "description" content = "ClassDoor">

 	<!-- Latest compiled and minified CSS-->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 	<!-- Optional theme -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

 	<!-- Latest compiled and minified jQuery -->
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
	 integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc="
  	crossorigin="anonymous"></script>

  	<!-- jQuery 3.1.1 -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

 	<!-- Latest compiled and minified JavaScript -->
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

 	<!--Link HTML file to CSS file -->
 	<link href="../css/registerstyle.css" rel="stylesheet" type="text/css">

</head>
</body>
  <div id="forgotpassdiv">
      <h1> FORGOT YOUR PASSWORD? </h1>
        <h4> Input your Drexel email address below. We'll email instructions on how to reset your password. </h4>
      <form action="forgot.php" method="post">
     		<div class="form-group">
          <label for="email"> Email: </label>
    			<input type="email" class="form-control" name="email" placeholder="jd123@drexel.edu" required />
          <button id="forgot-btn" type="submit" name="forgotpass"> Reset Password </button>
        </div>
  </div>
</body>
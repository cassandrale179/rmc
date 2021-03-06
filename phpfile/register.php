<?php
	session_start();
	include "adb.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

	//---- CHECK IF IT IS A DREXEL EMAIL----
	$email = $_POST['email'];
	$myArray = explode('@', $email);
	if ($myArray[1] != "drexel.edu"){
			echo "<script>alert('Please enter your Drexel email address')</script>";
	}

	//---- CHECK IF EMAIL ALREADY EXIST IN DATABASE -----
	else
	{
		$emailCheck = mysqli_query($conn, "select * from users where email = '$email'");
		$emailRow = mysqli_fetch_array($emailCheck);
		if ($emailRow['email'] == $email)
		{
			echo "<script>alert ('An account is already registered with this email. If you forget your password or username, click on Login and choose Forgot Password. If you have not registered with this email before, let us know immediately.')</script>";
		}

		//---- CHECK IF PASSWORD MATCH-------
		else
		{
			if ($_POST['password'] == $_POST['confirmpassword'])
			{
				//----- CHECK IF USERNAME ALREADY EXIST-------
				$username = $_POST['username'];
				$password = base64_encode($_POST['password']);
				$result = mysqli_query($conn, "select * from users where username = '$username'");
				$row = mysqli_fetch_array($result);
				if ($row['username'] == $username){
				echo "<script>alert('This username already exist. Please choose something else')</script>";
				}
				else
				{
					$randnum = rand(1000,10000);
					$to = $email;
					$subject = "Confirm your email | RateMyClass";
					$message = "Thank you for signing up! Your verification code is $randnum ";
					$headers = 'From:no-reply@ratemyclass.org' . "\r\n";
					mail($to, $subject, $message, $headers);

					//----- INSERT STUFF AND UPDATE THE DATABASE-------
					$sql = "INSERT INTO users(username, email, password, randnum)". "VALUES ('$username', '$email', '$password', '$randnum')";
					if ($conn->query($sql)===true)
					{
						header("location: dashboard.php");
						$_SESSION['username'] = $username;
						$_SESSION['logged_in'] = 1;
					}
				}
			}
			else{
				echo "<script>alert('Two passwords do not match'); </script>";
			}
		}
	}
}
?>


<!-- __________________________________________ HTML PART _______________ ____________________  -->
<!DOCTYPE html>
<html lang = "en">
<html>
<head>
	<meta charset="utf-8">
 	<meta name = "viewport" content="width=device-wdith, initial-scale=1">
	<title> GradeRank Registration</title>

	<!-- Latest compiled and minified CSS for Bootstrap -->
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

 	<!-- Link the HTML with CSS -->
	<link rel="stylesheet" href="../css/registerstyle.css" type="text/css">

	<!-- Link the HTML to Font Awesome Icon (Bootstrap CDN) -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div>
	    <form class="form form-group" action="register.php" method="post" enctype="multipart/form-data" autocomplete="off">


	    	<!-- ________________________________ FIRST DIV SHOWN ______________________________________-->
		    <div id="account">
		    	<h1>Register</h1>
			    <div>
					<label for="username"> Username: </label>
			    	<input class="form-control" type="text" placeholder="johndoe123" name="username" required />
			    </div>
			    <div class="space">
			    	<label for="email"> Drexel Email: </label>
				    <input class="form-control" type="email" placeholder="jd123@drexel.edu" name="email" required />
				</div>
				<div id="flex-display" class= "space">
					<div id="pass1">
						<label for="password"> Password: </label>
				    	<input type="password" class="form-control" placeholder="Password" name="password" autocomplete="new-password" aria-describedby="passHelp" required />
				    </div>
				    <div id = "pass2">
				    	<label for="confirmpassword"> Confirm Password: </label>
				    	<input type="password" class="form-control" placeholder="Password must match" name="confirmpassword" autocomplete="new-password" aria-describedby="passHelp2" required />
				    </div>
				</div>
				<div id="next">
					<input type="submit" value="Register" name="next" class="next-btn inline" />
				</div>
</body>

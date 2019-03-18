<?php 

   
   if(isset($_POST['submit'])){
	   $dbconn = mysqli_connect('localhost','root','','userdata');
	   $fname = mysqli_real_escape_string($dbconn,$_POST['fullname']);
	   $uname = mysqli_real_escape_string($dbconn,$_POST['uname']);
	   $password = mysqli_real_escape_string($dbconn,$_POST['password']);
	   $email = mysqli_real_escape_string($dbconn,$_POST['email']);
	   $gender = mysqli_real_escape_string($dbconn,$_POST['gender']);
	   $religion = mysqli_real_escape_string($dbconn,$_POST['religion']);
	   $query = "INSERT INTO sign_up(fullname,username,password,email,gender,religion) Values ('$fname','$uname','$password','$email','$gender','$religion') ";
	   $exquery = mysqli_query($dbconn,$query);
	   if($exquery){
		   header('Location:index.php?msg='.urldecode("Accounted created Successfully"));
	   }
       mysqli_close($dbconn);
   }
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
	body{
		background:#f48e36b0;
		margin:0;
		padding:0;
	}
	   span{
		   color:#fff;
	   }
	   .signup{
		   width: 400px;
    margin: 0 auto;
    background: #F44336;
    padding: 30px 0 20px 50px;
    border-radius: 5px;
	   }
	   input[type="text"],input[type="email"],input[type="password"],input[type="text"]{
		   width: 180px;
    margin-left: 30px;
    background: #3f51b545;
	   }
	   #goto{
		   text-decoration:underline;
		   margin-top:10px;
		   display:block;
	   }
	 
	   h1{
		   color: #fff;
    text-align: center;
    display: block;
    padding-top: 30px;
	   }
	</style>
</head>
<body>
<div class="header"><h1>User Registration Page</h1></div>
	<div class="signup">
	   <form action="signup.php" method="post">
	   <table>
	      <tr><span>Full Name:</span> <input type="text" name="fullname" required/></tr> <br /><br />
	      <tr><span>User Name:</span> <input type="text" name="uname" required/></tr> <br /><br />
	      <tr><span>Password:</span> <input type="password" name="password" required/></tr> <br /><br />
	      <tr><span>Email: </span><input type="email" name="email" required/></tr> <br /><br />
	      <tr>
		  <span>Gender: </span><br /> <input type="radio" name="gender" value="Male"/><span>Male</span> <br />
		    <input type="radio" name="gender" value="Female"/><span>Female</span>
		  </tr> <br /><br />
		  <tr><span>Religion:</span> <select name="religion" >
		       <option value="0">Select</option>
		       <option value="Islam">Islam</option>
		       <option value="Hindu">Hindu</option>
		       <option value="Kristan">Kristan</option>

		  </select></tr><br /><br />
	      <tr> <input type="checkbox" name="term"  /><span> I accept all terms and conditions </span></tr>
	   </table>
	   <input type="submit" value="SUBMIT" name="submit"/>
	</form>
	<a href="index.php" id="goto"><span>Go To Home</span></a>
	</div>
	<div class="footer"></div>
</body>
</html>
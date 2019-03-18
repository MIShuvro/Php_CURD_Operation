<?php 
   $id = $_GET['id'];
	$dbconn = mysqli_connect('localhost','root','','userdata');
	$rquery = "SELECT * FROM sign_up WHERE id=$id";
	$exquery = mysqli_query($dbconn,$rquery);
	$getData = mysqli_fetch_assoc($exquery);
   if(isset($_POST['submit'])){
	   $fname = mysqli_real_escape_string($dbconn,$_POST['fullname']);
	   $uname = mysqli_real_escape_string($dbconn,$_POST['username']);
	   $email = mysqli_real_escape_string($dbconn,$_POST['email']);
	   $gender = mysqli_real_escape_string($dbconn,$_POST['gender']);
	   $religion = mysqli_real_escape_string($dbconn,$_POST['religion']);
	   $query = "UPDATE sign_up SET
	     fullname='$fname',
	     username='$uname',
	     email='$email',
	     gender='$gender',
	     religion='$religion'
		 WHERE id=$id";
       $update = mysqli_query($dbconn,$query);
	   if($update){
		   header('Location:profile.php?msg='.urldecode("Data updated Successfully"));
	   }
       
   }
   
  if(isset($_POST['delete'])){
	  $query = "DELETE FROM sign_up WHERE id=$id";
	  $delete = mysqli_query($dbconn,$query);
	  if($delete){
		  
		 session_start();
if(session_destroy()) 
{
header("Location: index.php?msg=".urldecode("Accounted Deleted Successfully")); 
}
		 
	  }
  }
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
	body{
		background:#FF5722;
	}
	   .update{
		   width: 400px;
    background: #F44336;
    margin: 30px auto;
    padding: 30px 0 25px 40px;
	color:#fff;
	   }
	   h1{
		   color:#fff;
	   }
	   a{
		   color:#fff;
		   display:block;
		   width:100px;
		   padding-top:10px;
	   }
	   input[type="submit"]{
		   padding:5px 10px;
		   cursor:pointer;
	   }
	   .header,.footer{
		   background:#673AB7;
		   width:100%;
		   height:150px;
		   margin:0;
		   padding:0;
	   }
	   
	</style>
</head>
<body>

<div class="update">
    <form action="update.php?id=<?php echo $id;?>" method="post">
	   <table>
	      <h1>Update Your Profile</h1>
	      <tr>Fullname: <input type="text" name="fullname" value="<?php echo $getData['fullname'];?>" /></tr><br /><br />
	      <tr>Username: <input type="text" name="username" value="<?php echo $getData['username'];?>"/></tr><br /><br />
	      <tr>Email: <input type="text" name="email" value="<?php echo $getData['email'];?>"/></tr><br /><br />
	      <tr>Gender: <input type="text" name="gender" value="<?php echo $getData['gender'];?>"/></tr><br /><br />
	      <tr>Religion: <input type="text" name="religion" value="<?php echo $getData['religion'];?>"/></tr><br /><br />
	   </table>
	   <input type="submit" value="UPDATE" name="submit"/>
	   <input type="submit" value="DELETE" name="delete"/>
	</form>
	<a href="index.php">Go To Home</a>
</div>

	
</body>
</html>
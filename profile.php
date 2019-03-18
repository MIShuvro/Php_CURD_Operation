<?php


include('session.php');

if(!isset($_SESSION['login_user'])){
header("location: index.php"); 
}



$conn = mysqli_connect("localhost", "root", "", "userdata");






$query = "SELECT * from sign_up where username = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);


?>


<!DOCTYPE html>
<html>
<head>
  <title>User Profile</title>
  <link href="style.css" rel="stylesheet" type="text/css">
  <style type="text/css">
  #edu{
		 list-style:none;
	 }
     table{
		 width: 500px;
    height: 400px;
    background: #673AB7;
    margin: 0 auto;
    padding: 30px 5px 20px 80px;
	 }
	 label{
		 color: #ddd;
    font-size: 20px;
    font-weight: bold;
    padding-right: 20px;
	 }
	 td{
		 color: #c5a26d;
    font-size: 18px;
	
	 }
	 .footer{
		 background:#F44336;
		 width:100%;
		 height:100px;
	 }
	 #welcome{
		 border: 1px solid #fff;
    padding: 5px 5px 5px 5px;
	 }
	 i{
		 color:#fff;
	 }
	 
  </style>
</head>
<body>
 <div id="profile">
  <b id="welcome">Hello : <i><?php echo $login_session; ?></i></b>
  <b id="logout"><a href="logout.php">Log Out</a></b>
  <ul>
  	<li id="edu"><a href="education.php" >Education</a></li>
  </ul>
 </div>
 
 <div class="user_data">
 
    <table>
	
	   <tr><td><label>Full Name: </label><?php echo $row['fullname'];?></td></tr>
	   <tr><td><label>User Name:</label> <?php echo $row['username'];?></td></tr>
	   <tr><td><label>Email: </label><?php echo $row['email'];?></td></tr>
	   <tr><td><label>Gender:</label> <?php echo $row['gender'];?></td></tr>
	   <tr><td><label>Religion:</label> <?php echo $row['religion'];?></td></tr>
	   <tr><td><label><a href="update.php?id=<?php echo urlencode($row['id']);?>">Update</a></label> </td></tr>
	  
	</table>
 </div>
 <div class="footer">
    <?php 
    if(isset($_GET['msg'])){
		echo "<span id='success'>".$_GET['msg']."</span>";
	}
 ?>
 </div>
</body>
</html>
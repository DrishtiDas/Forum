<html>
<head><title>Login with your Account</title></head>
<body>

<form action="login.php" method="POST">
Username:<input type="text" name="username"><br /><br />
Password:<input type="password" name="password"><br /><br />
<input type="submit" name="submit" value="Login"><br />
</form>
</body>

</html>

<?php
session_start();

$con = mysqli_connect('127.0.0.1', 'root', 'password');
if(!$con)
{
  echo 'Not connected to Database';
}

if(!mysqli_select_db($con,'php_forum'))
{
  echo 'Database not selected';
}

if(isset($_POST['username']) and isset($_POST['password'] )) {
	
$username=@$_POST['username'];
$password=@$_POST['password'];

//if(isset($_POST['submit']))  {
   
//  if($username && $password)  {

  $query="Select * from user where username='$username' and password='$password' ";

$result=mysqli_query($connection, $query) or die(mysqli_error($connection));
$count=mysqli_num_rows($result);


// $rows=mysqli_fetch_array($sql);

if($count == 1)  {

$_SESSION['username']=$username;  }

 else {

$fmsg="Invalid Log In credentilas";  }  }


if(isset($_SESSION['username']))   {

$username=$_SESSION['username'];

echo 'Logged in';

}
else  {

echo 'Try again';

}

?>
 
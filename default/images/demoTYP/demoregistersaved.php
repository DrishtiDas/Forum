<html>
<head><title>Register account </title></head>

<body>

<form action="demoregister.php" method="POST">

Username:<input type="text" name="username">
<br /><br />Password:<input type="password" name="password">
<br /><br />Confirm Password:<input type="password" name="repassword">
<br /><br />Email:<input type="text" name="email">

<br /><br /><input type="submit" name="submit" value="Register"> or <a href="login.php">Login</a> 

</form> 	


</body>

</html>

<?php

$con = mysqli_connect('127.0.0.1', 'root', 'password');
if(!$con)
{
  echo 'Not connected to Database';
}

if(!mysqli_select_db($con,'php_forum'))
{
  echo 'Database not selected';
}

	
$username=@$_POST['username'];
$password=@$_POST['password'];
$repass=@$_POST['repassword'];
$email=@$_POST['email'];

if(isset($_POST['submit']))  {

if($username && $password && $repass && $email) {

if(strlen($username) >=5 && strlen($username) < 25 && strlen($password) > 6)  {

if($repass == $password)  {

$sql="Insert into user(username, password, email) values('$username', '$password', '$email')" ;  

if(!mysqli_query($con,$sql))

 {
    echo 'Not Registered';
  }

else {  
      
      echo 'Registered';
      }  }

else { echo 'Password does not match'; } } 

else { 
             if(strlen($username) < 5 || strlen($username) > 25) {
                     
                          echo 'Username must be in between 5 to 25 characters'; }

             if(strlen($password) < 6) {

                         echo '<br />Password must be longer than 6 characters'; }  } }

 else { echo 'Please fill all the fields';}
 
 }

header("refresh:120; url=demoregister.php")

?>
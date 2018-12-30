 <html>
<head><title>Register account </title>
<style>

input[type=submit]
 {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
</style>

<link rel="stylesheet" type="text/css" href="registerstyle.css">

</head>

<body background="bg2.jpg">

<form action="demoregister.php" method="POST">

Username:<br /><br /><input type="text" name="username" style="border-color:red">
<br /><br />Password:<br /><br /><input type="password" name="password" style="border-color:blue">
<br /><br />Confirm Password:<br /><br /><input type="password" name="repassword" style="border-color:green">
<br /><br />Email:<br /><br /><input type="text" name="email" style="border-color:yellow">

<br /><br /><input type="submit" name="submit" value="Register"  style="font-size:x8font-weight: bold"> or <a href="login.php">Login</a> 

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
      
      echo 'You have been registered as  '.$username.' . Click<a href="login.php"> here</a> to login';
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
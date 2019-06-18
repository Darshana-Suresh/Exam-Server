<?php
	session_start();
	$_SESSION["uname"]=0;
        $_SESSION["mismatch"]=0;
        $_SESSION["confirmed"]=0;

?>

<!DOCTYPE html>

<html>

<head>

<title>Login Page</title>
<link rel="stylesheet" href="style.css">

<script>
	
  var reg="<?php echo $_SESSION['registered']; ?>";
  if(reg==1) alert("Registration successful");
  var flag="<?php echo $_SESSION['flag']; ?>";
	
  if(flag==1) alert("User has already registered with the email id");

</script>

</head>

<body>
<div class="loginBox">
<div id="new">
<div id="login">

	<h1><center>Login</center></h1>

	<form action="checklogin.php" method="POST">

        <fieldset>
	  
    	  <table id="align">
  
             <tr id="1">
		<td><h4>Email id:</h4></td>

        	<td><input type="text" name="email" id="email" placeholder="Enter Email"></td>
     
        </tr>

             <tr id="2">
		<td><h4>Password:</h4></td>

        	<td><input type="password" name="pwd" id="pwd" placeholder="Enter Password"></td>

             </tr>

          </table>
	  
        
 </fieldset>
<div id="test">
         <input type="submit" name="submit" id="submit" value="Submit">
</div>
         </form>
<br>
	<div id="check">Not registered yet?
	
        <a href="RegPage.php" alt="login">Register Now</a>

        </div>
</div>
</div>
</div>
</body>


</html>


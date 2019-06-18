<?php
	session_start();
	$_SESSION['flag']=0;
	$_SESSION['registered']=0;
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
    
   
    <style>
    	#regform{
        			padding:2%;
                }
		fieldset{ padding:2%;
        		  margin-bottom:3%;
                } 
		body {
    			background: url(back.jpg) no-repeat;
    			background-size: cover;
    			background-position: center;
    			font-family: 'Open Sans', sans-serif;
    			font-size: 125%;
    			position: relative;
    			min-height: 100vh;
    			font-weight:bold;
       		}
		.buttons{
			font-size:100%;
			margin-right:2%;
			padding:0.3% 1% 0.3% 1%;
		}	 
		h1{
			margin:0.2%;
		}  
			
    </style>
<script>
	var mismatch="<?php echo $_SESSION['mismatch']; ?>";
	if(mismatch==1) alert("Your passwords didn't match. Try again.");
        var uname="<?php echo $_SESSION['uname']; ?>";
	if(uname==1) alert("Username is already taken. Please give a different one.");
</script>
</head>
<body>

<!-- Registration Form ---------------------------------------------------------- !-->
<div id="regform">
<h1> <center>Registration Form</center></h1>
<div id="loginLink">
Already registered?
<a href="index.php" alt="login">Login</a>			
</div><br>
<form action="confirm.php" method="post">
	<fieldset>
	<legend>Personal Details</legend>
	<table>
		<tr><td>Name:</td>
			<td><input type="text" name="myname" id="name" required></td>
		</tr>
		<tr><td>DOB:</td>
			<td><input type="date" name="dob" id="dob" required></td>
		</tr>
		<tr><td>Email id:</td>
			<td><input type="email" name="email" id="email" required></td>
		</tr>
	</table>
	</fieldset>
	<fieldset>
	<legend>Educational Details</legend>
	<table>
		<tr><td>Roll Number:</td>
			<td><input type="text" name="rno" id="rno" required></td>
		</tr>
		<tr><td>College Name:</td>
			<td><input type="text" name="college" id="college" required></td>
		</tr>
		<tr><td>Branch:</td>
			<td><input list="branches" name="branches">
    			<datalist id="branches">
    		    <option value="Computer Science">
        		<option value="Electronics and Communication">
        		<option value="Electrical and Electronics">
		        <option value="Mechanical">
    		    <option value="Civil">
    		    <option value="Chemical">
        		<option value="Engineering Physics">
    		    <option value="Biotechnology">
       			<option value="Production Engineering">
        		</datalist></td>
		</tr>
		<tr><td>CGPA:</td>
			<td><input type="text" name="cgpa" id="cgpa" required></td>
		</tr>
		<tr><td>Graduation Year:</td>
			<td><select id="yearList" name="ylist">
            			<option id="1"></option>
    					<option id="2"></option>
                        <option id="3"></option>
                        <option id="4"></option>
        		</select></td>
		</tr>
     <script>
    	var today=new Date;
        var this_year=today.getFullYear();
        var last=5;
        var count=1;
        do{
        	document.getElementById(count).innerHTML=this_year;
            this_year=this_year+1;
            count=count+1;
           }while(count<last);
// to compare strings: string1.localeCompare(string2);
	function passfunc(){
	var x=document.getElementById("pwd").value;
		if(x.length>8)
			msg="Strong";
		else
			msg="Poor";
		document.getElementById("pwwd").innerText=msg;
	}
    </script>

	</table>
	</fieldset>
    <fieldset>
    <legend>Credentials</legend>
    <table>
    <tr><td>Enter username:</td>
    	<td><input type="text" name="uname" id="uname" required></td>
    </tr> 
    <tr><td>Enter password:</td>
    	<td><input type="password" name="pwd" id="pwd" value="" onkeyup="passfunc()" required/><span id="pwwd"></span></td>
    </tr>
    <tr><td>Re-enter password:</td>
    	<td><input type="password" name="cpwd" id="cpwd" required></td>
    </tr>
    </table>
    </fieldset>
	<input type="submit" name="submit" value="Submit" class="buttons">
	<input type="reset" name="reset" class="buttons">
</form>
</div>
<?php
	if($_SESSION["confirmed"]==1)
	{

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		$userName=$_COOKIE["registeredUser"];
		$sql = "DELETE FROM RollList WHERE USERNAME='$userName'";
		if ($conn->query($sql) === TRUE) 
		{
			echo "Done";
			//$_SESSION["registered"]=1;
			//header('location: index.php');
		} else 
		{
			echo "Not done";
			//include 'RegPage.php';
		    //echo "Error: " . $sql . "<br>" . $conn->error;
		}
}
$_SESSION["confirmed"]=0;
	}
	$conn->close();
	?> 


</body>
</html>


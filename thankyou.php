<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<title>Thankyou Page</title>
<head>
<style>
body {
    background: url(thank.jpg) no-repeat;
    background-size: cover;
    background-position: center;
    font-family: 'Open Sans', sans-serif;
    font-size: 125%;
    position: relative;
    min-height: 100vh;
       }
#check {
    width:10em;
    height:3em;
   }
h2{
    padding-top:10%;
}
</style>
</head>
<body>
<br><br>
<!--h1> THANKYOU PAGE</h1><br-->
<h2 style="text-align:center; font-style:italic; font-family:garamond; font-size:350%">Thank you for taking this quiz!</h2>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "exam";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

    $u = $_SESSION["current_user"];
	$m=$_SESSION["mark"];
	//$n=$_COOKIE["user"];
	$y="Yes";
	//echo $n;
	$sql="UPDATE RollList SET marks=$m,ATTEMPTED='$y' WHERE USERNAME='$u'";
	$conn->query($sql);
		

?>
<br><br>
<form action="index.php" method="POST">
<div style="text-align:center;">
<input type="submit" value="Home" id="check" style="font-size:20px; font-family:garamond">
</div>
</form>
</body>
</html>

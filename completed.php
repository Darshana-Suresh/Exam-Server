<?php   session_start();    ?>
<html>
<head>
<title>Test Completed</title>
<style>
body {
    background: url(back.jpg) no-repeat;
    background-size: cover;
    background-position: center;
    font-family: 'Open Sans', sans-serif;
    font-size: 125%;
    position: relative;
    min-height: 100vh;
       }

#sha {
	text-align:center;
	width:50%;
	margin: auto;
	margin-top:300px;
	font-size:150%;
}
#logout{
    font-size:80%;
    padding:1%;
}
</style>
<script>

<?php $cookie=$_SESSION["current_user"];	?>
var name="<?php echo $_COOKIE[$cookie]; ?>";

alert("Welcome "+name+" !");

</script>
</head>
<body>
<div id="sha">
 <?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "exam";


$un=$_SESSION["current_user"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$flag=0;

$sql = "SELECT marks FROM RollList WHERE USERNAME='$un'";
$result = $conn->query($sql);
//echo "Table here<br>".$result;
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {  

       echo "Hi ".$_COOKIE[$un].", you have already attempted the test."."<br>"."Your score is ".$row["marks"]."/".$_SESSION["total_q"]."<br><br>";    }
} 
//------------------------------------------------------------------------------
  
//----------------------------------------------------------------------------------------
$conn->close();
?> 
<form action="index.php" method="post">
<input type="submit" value="LOGOUT" id="logout">
</form>
</div>
</body>
</html>

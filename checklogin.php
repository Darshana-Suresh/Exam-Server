<?php
	session_start();
$_SESSION["registered"]=0;

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "exam";

$em=$_POST["email"];
$pw=$_POST["pwd"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$flag=0;	//check if email was is found

$sql = "SELECT * FROM RollList";
$result = $conn->query($sql);
$sql2="SELECT COUNT(*) FROM QUESTIONS";
$res=$conn->query($sql2);
$q_count=$res->fetch_assoc();
$_SESSION["total_q"]=$q_count["COUNT(*)"];

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
      if ($row["EMAILID"]==$em)
        { 
		$flag=1;
		if($row["PASSWORD"]==$pw)
		{	 
			$_SESSION["current_user"]=$row['USERNAME'];
			$name=$row["NAME"];

			if ($row["ATTEMPTED"]=="Yes")
				header ('location: completed.php');
			else header('location: inst.php') ;
		} 
		else
		{
			echo "<script>alert('Wrong password');</script>";
			header('location: index.php');
		}
		
	}
    }
} 


setcookie("user",$name,time()+2073600,"/");

if ($flag==0)
	{ $message = "User has not registered";
echo "<script type='text/javascript'>alert('$message');</script>"; include 'RegPage.php';}
$conn->close();
?> 


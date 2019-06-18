<?php 
    session_start();
    $_SESSION["flag"]=0;
	$_SESSION["mismatch"]=0;
	$_SESSION["uname"]=0;
    $_SESSION["registered"]=0;
?>
<!DOCTYPE html>
<head>
<title>Confirmation Page</title>
</head>
<body>
<h1>Confirmation</h1>
<script>

alert("If you would like to change any info entered, you may do so by pressing 'BACK' button or press 'SUBMIT' button for final submission");
</script>

<?php

$name=$_POST["myname"];
$dob=$_POST["dob"];
$email=$_POST["email"];
$roll=$_POST["rno"];
$clg=$_POST["college"];
$brc=$_POST["branches"];
$cg=$_POST["cgpa"];
$yl=$_POST["ylist"];
$un=$_POST["uname"];

    echo "Name : ".$_POST["myname"]."<br>";
    echo "DOB : ".$_POST["dob"]."<br>";
    echo "Email ID : ".$_POST["email"]."<br>";
    echo "Roll Number: ".$_POST["rno"]."<br>";
    echo "College : ".$_POST["college"]."<br>";
    echo "Branch :".$_POST["branches"]."<br>";
    echo "CGPA : ".$_POST["cgpa"]."<br>";
    echo "Year of Graduation: ".$_POST["ylist"]."<br>";
    echo "Username : ".$_POST["uname"]."<br>";

?>

<form>
<button type ="submit" formaction = "index.php">SUBMIT</button>
<button type = "submit" formaction = "RegPage.php">BACK</button>
</form>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "exam";


$name=$_POST["myname"];
$dob=$_POST["dob"];
$email=$_POST["email"];
$roll=$_POST["rno"];
$clg=$_POST["college"];
$brc=$_POST["branches"];
$cg=$_POST["cgpa"];
$yl=$_POST["ylist"];
$un=$_POST["uname"];
$pd=$_POST["pwd"];
$cpd=$_POST["cpwd"];
$local_flag=0;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($pd<>$cpd)
{
	$_SESSION["mismatch"]=1;
	
	header( 'location: RegPage.php'); 
}
else
{

	$sql="SELECT USERNAME,EMAILID FROM RollList";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{

		while($row = $result->fetch_assoc()) 
		{
		    	if ($row["EMAILID"]==$email)
     			{ 	$_SESSION["flag"]=1;
				header('location: index.php'); 
				$local_flag=1;		
			}

			elseif ($row["USERNAME"]==$un)
             		{ 
				$_SESSION["uname"]=1;
				header( 'location: RegPage.php');
				$local_flag=1;
	     		}
     
    		}
	} 
	
	if($local_flag==0)		//No other user with same email or username exists
	{
		$y="No";
        $p=$pd;
        setcookie("registeredUser",$un,time()+76000,"/");
		$sql = "INSERT INTO RollList (NAME,DATE_OF_BIRTH,EMAILID,ROLL_NUMBER,COLLEGE_NAME,BRANCH_NAME,CGPA,GRADUATION_YEAR,USERNAME,PASSWORD,marks,ATTEMPTED)
		VALUES ('$name','$dob','$email','$roll','$clg','$brc','$cg','$yl','$un','$p',0,'$y')";

		if ($conn->query($sql) === TRUE) 
		{
			$_SESSION["registered"]=1;
			//header('location: index.php');
		} else 
		{
			echo "<script>alert('Please Enter Valid Details.');</script>";
			include 'RegPage.php';
		    //echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}
$_SESSION["confirmed"]=1;
$conn->close();
?> 
</body>
</html>

<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<title>Result Page</title>
<head>
<style>
body {
    background: url(back2.jpg) no-repeat;
    background-size: cover;
    background-position: center;
    font-family: 'Open Sans', sans-serif;
    font-size: 100%;
    min-height: 100vh;
       }
h1 {
    text-align:center;
    font-family:palatino;
    font-size:75px;
}
#check {

	font-size:30%;
	padding:1%;
}
#check1 {
	text-align:center;
	font-size:100px;
}
#marks {
	width:50%;
	margin:auto;
	font-size:175%; 
	text-align:center;
}

</style>
</head>
<body><br><br>
<?php

	if(isset($_POST["finish"]))
	{
		$cnt=$_SESSION["count"];
		$answer = $_POST['opt']; 
		if($_POST["opt"]!="") {
	
			$_SESSION["q_att"][$cnt]=1;
			$_SESSION["attempt"]++;
		}
		else $_SESSION["q_att"][$cnt]=0;
		if($answer==$_SESSION["correct"]){
			 $_SESSION["mark"]=$_SESSION["mark"]+1;
			 $_SESSION["q_crct"][$cnt]=1;
			}
		else
		{
			$_SESSIOn["q_crct"][$cnt]=0;
		}
	}
?>
<h1> RESULTS</h1>
<div id="marks">
<?php $wrong=$_SESSION["attempt"]-$_SESSION["mark"]; ?>
<?php echo "Your Name: ".$_COOKIE["user"]."<br>YOUR TOTAL MARKS : ".$_SESSION["mark"]."/".$_SESSION["total_q"]."<br><br>"; ?>
<?php echo "You have attempted ".$_SESSION["attempt"]." questions<br>"; ?>
<?php echo "Number of correct answers: ".$_SESSION["mark"]."<br>";?>
<?php echo "Number of wrong answers: ".$wrong."<br>";?>

<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "exam";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

	if($_SESSION["mark"]!=$_SESSION["attempt"])
	{
		echo "<br> Questions where you made a mistake: <br><br>";

		$cnt=1;
		while($cnt<=$_SESSION["count"])
		{
			if($_SESSION["q_att"][$cnt]==1)
			if($_SESSION["q_crct"][$cnt]==0)
			{
				$sql="SELECT * FROM QUESTIONS WHERE qno=$cnt";
				

		        $result = $conn->query($sql);
			$row = $result->fetch_assoc();

			$op="opt_".$row["correct_opt"];
			$ans=$row[$op];
			$q=$row["question"];
				echo $q."<br>Answer: ".$ans."<br><br>";
			}
			$cnt++;
		}


	}
?>
</div>
<br><br>
<form action="thankyou.php" method="post">
<div id="check1">
<input type="submit" value="Logout" id="check">
</div>
</form>
</body>
</html>

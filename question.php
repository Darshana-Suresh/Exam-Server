<?php
	session_start();
	if($_SESSION["begin"]==1)
	{
		$present=time();
		$_SESSION["end_time"]=$present+600;
		$_SESSION["begin"]=0;
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Exam Server</title>
<style>
	.b1,.b2,.b3{
		float:left;
		margin-right:3%;
		padding:0.5% 2% 0.5% 2%;
		font-size:80%;
		}
#alignment {
		margin:20px;
		font-size: 30px;
		padding:0.5% 4% 4% 4%;
}
#align { margin:20px;
		padding-left:5%;
		}
body {
    background: url(ques.jpg) no-repeat;
    background-size: cover;
    background-position: center;
    font-family: 'Open Sans', sans-serif;
    font-size: 125%;
    position: relative;
    min-height: 100vh;
       }
#countdown{
	text-align:right;
	padding-right:3%;
	padding-top:3%;
}
</style>
<script>

<?php $t=time();
	$time_left=$_SESSION["end_time"]-$t;
?>
	
	var a="<?php echo $time_left; ?>";
	setInterval(checkTime,1000);
	function checkTime()
	{
		a=a-1;
		if(a==5) alert("Hurry up! Only 5 seconds left!");
		if(a==0) {
				alert("Your time is up! The test has ended.");
				location.href="result.php";
			}
		var seconds = Math.floor((a) % 60);
  		var minutes = Math.floor(a/ 60);
		document.getElementById("countdown").innerHTML="Timer: "+minutes+" m "+seconds+" s";
	}
</script>
</head>
<body>
<h1 id="countdown">Timer: </h1>
<script>checkTime();</script>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "exam";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
$cnt=$_SESSION["count"];
	if(($_SESSION["count"]>0)&&($_SESSION["prev_flag"]==0))
	{
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
			$_SESSION["q_crct"][$cnt]=0;
		}
	}
	$_SESSION["prev_flag"]=0;

	$_SESSION["count"]=$_SESSION["count"]+1;
	$count=$_SESSION["count"];
			$sql="SELECT * FROM QUESTIONS WHERE qno=$count";

		        $result = $conn->query($sql);
			$row = $result->fetch_assoc();
			if($row=="") 
				{	
					 header('location: result.php');
										
				}
                $_SESSION["correct"]=$row["correct_opt"];
				$_SESSION["q"]=$row["question"];
?>
<div id="alignment">
				<?php echo "<h3> Question ". $row["qno"] ." of ".$_SESSION["total_q"]."</h3>"; ?>
				<?php echo "<br>Q: " . $row["question"]."<br><br>"; ?>
				<form action="question.php" method="POST">
        			<input type="radio" name="opt" value="1"><?php echo "a) " . $row["opt_1"] . "<br>"; ?>
        			<input type="radio" name="opt" value="2"><?php echo "b) " . $row["opt_2"] . "<br>"; ?>
        			<input type="radio" name="opt" value="3"><?php echo "c) " . $row["opt_3"] . "<br>"; ?>
        			<input type="radio" name="opt" value="4"><?php echo "d) " . $row["opt_4"] . "<br>"; ?>
</div>
				<div id="align">
				<button type="submit" formaction="previous.php" name="prev" class="b3">Previous</button>
				<button type="submit" formaction="question.php" name="next" class="b1">Next</button>
				<button type="submit" formaction="result.php" name="finish" class="b2">Finish</button></div>   	
				</form>	
				<?php
$conn->close();

?>
</body>
</html>

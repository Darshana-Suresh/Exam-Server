<?php
	session_start();
	$_SESSION["begin"]=1;
	$_SESSION["prev_flag"]=0;
	$cookie=$_SESSION["current_user"];
	$_SESSION["flag"]=0;
	$_SESSION["q_att"];
	$_SESSION["q_crct"];
//	setcookie("user",$cookie,time()+7200,"/");
?>

<!DOCTYPE html>

<html>

<head>
<title>Instructions Page</title>
<?php 
	$_SESSION["count"]=0;
	$_SESSION["mark"]=0;
	$_SESSION["correct"]=0;
	$_SESSION["attempt"]=0;
	$_SESSION["wcnt"]=0;



?>

<script>

	
var name="<?php echo $_COOKIE["user"]; ?>";

alert("Welcome "+name+" !");

</script>

<style>
body {
    background: url(back4.jpg) no-repeat;
    background-size: cover;
    background-position: center;
    font-family: 'Open Sans', sans-serif;
    font-size: 125%;
    position: relative;
    min-height: 100vh;
       }
#check { width:10em; height:3em;}
#ins {
	text-align:center;
	width:50%;
	margin: auto;
	margin-top:100px;
	font-size:150%;
}
</style>
</head>

<body>
<br><br><br><br><br>
<h1 style="text-align:center;font-size:280%;font-family:Georgia, serif;"> INSTRUCTIONS</h1>
<div id="ins">
<p>
1.The student may not use his or her textbook, course notes, or receive help from a proctor or any other outside source.<br>
2.Students must complete the 10-question multiple-choice exam within the 10-minute time frame allotted for the exam.<br>
3.Each correct answer gives you 1 mark. No negative marking.<br>
4.Cheating in exam hall is strictly punishable.<br>
5.Malpractices such as trying to leave the browser midway will lead to automatic exam submission with zero marks.<br>
</p>
</div>
<br>

<form action="question.php" method="POST">
<div style="text-align:center;font-size:50px">
  
<input type="submit" name="begin" value="BEGIN" id="check">

</div>
</form>

</body>

</html>

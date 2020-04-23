<?php
session_start();
$login=$_SESSION['login'];
$usr_name=$_SESSION['username'];
$id=$_SESSION['loginid'];
$jobid=$_SESSION['jobid'];
if($login)
{
	
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>QUIZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/navbar.css" type="text/css" />
</head>
<body>
		<div class="contain">
			<img src="logonew.png" alt="logo" />
			<h1>OES</h1>
			<h3>Online Exam System<h3>
		</div>
<ul id="ul">
  
</ul>
<br>
<br>
	<main>
		<div class="container">
			<h2>Instructions</h2>
			<ul>
				<li><strong>Number of Questions: 10 </strong></li>
				<li><strong>Type: </strong>Multiple Choice</li>
				<li><strong>Total Marks: <?php echo $jobid ?> </strong>Marks</li>
			</ul>
			<form action="question.php" method="POST">
   
    <input type="submit" style="width: 20%; height: 20%" value="Start Quiz">
  </form>
		
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2017, OES
		</div>
	</footer>
</body>
</html>
<?php
}
else
  header("location:login.php");
?>
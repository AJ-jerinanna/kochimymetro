<?php
include 'co.php';
session_start();
$login=$_SESSION['login'];
$usr_name=$_SESSION['username'];
$id=$_SESSION['loginid'];
$jobid=$_SESSION['jobid'];
if($login)
{

$total=0;
$qry3 = "SELECT * from `answer` where elid='$id'  ";
$result3 = mysqli_query($con,$qry3);

while ($row3=mysqli_fetch_array($result3)) {
$total=$total+$row3['score'];

}

$sql1="UPDATE `examlogin` SET `attstatus`=1 , `totalscore`=$total where elid=$id"; 
 $ru=mysqli_query($con,$sql1);
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>FINAL</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<header>
		<div class="container">
			<h1>Aptitude Test</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<h2>You're Done!</h2>
				<p>Congrats! You have completed the test </p>
				<a href="login.php" class="start">Return to home</a>
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
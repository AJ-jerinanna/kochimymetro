<?php
session_start();
$login=$_SESSION['login'];
$usr_name=$_SESSION['username'];
$id=$_SESSION['loginid'];
if($login)
{
?>


<?php
$connect = mysqli_connect("localhost","root","","kochimymetro"); 
$query = "SELECT * FROM addjob,examlogin where examlogin.examdate = '2020-04-23' and addjob.jobid= examlogin.jobid ";  
 $result = mysqli_query($connect, $query);  
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
 <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  

                               ?> 
	<main>
		<div class="container">
			<h2><?php echo $row['jobrole'];?></h2> 


<a class="start" href="ins.php" onclick="<?php $_SESSION['jobid']=$row['jobid'] ?>" > Start </a>

		
			
		</div>
	</main>
	<?php
}
?>
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
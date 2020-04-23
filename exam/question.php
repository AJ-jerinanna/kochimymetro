<?php
include 'co.php';
session_start();
$login=$_SESSION['login'];
$usr_name=$_SESSION['username'];
$id=$_SESSION['loginid'];
$jobid=$_SESSION['jobid'];
$q = $_SESSION['q'];
if($login)
{
$sql1="UPDATE `examlogin` SET `lstatus`=1 where elid=$id"; 
 $ru=mysqli_query($con,$sql1);
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>TEST</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	</head>
<body>
	<header>
		<div class="container">
			<h1>Aptitude Test</h1>
			<div id="txt"></div>
		</div>
	</header>
	<?php
	$sql = "SELECT  * FROM `examquestions` WHERE jobid='$jobid'" ;
$result = mysqli_query($con, $sql);
 
$n=mysqli_num_rows($result);

while($row=mysqli_fetch_assoc($result)) {
          $qno=$row['qid']; 
          $query = "SELECT * FROM `answer` WHERE elid='$id' AND qid='$qno' AND jobid='$jobid' ";
          $res = mysqli_query($con, $query);
          if(mysqli_num_rows($res)==0) {
           
      ?>
	<main>
		<div class="container">
			<div class="current">Question 1 of 10 </div>
			<p class="question">
				
				<?php echo $row['question'];;
				?>
			</p>
			<form method="post" action="process.php">
				<ul class="choices">
					
						<li><input name="choice" type="radio" value="<?php echo $row['option1'];?>" /><?php echo $row['option1'];?></li>
						<li><input name="choice" type="radio" value="<?php echo $row['option2'];?>" /><?php echo $row['option2'];?></li>
						<li><input name="choice" type="radio" value="<?php echo $row['option3'];?>" /><?php echo $row['option3'];?></li>
						<li><input name="choice" type="radio" value="<?php echo $row['option4'];?>" /><?php echo $row['option4'];?></li>
						<input type="hidden" name="ans" value="<?php echo $row['answer']; ?>"/>
						<input type="hidden" name="eid" value="<?php echo $id; ?>"/>
						<input type="hidden" name="qid" value="<?php echo $qno; ?>"/>
						<input type="hidden" name="jobid" value="<?php echo $jobid; ?>"/>
					
				</ul>
				
    <input type="submit" name="submit"  value="Next">
			</form>
		</div>
	</main>
	<?php
         break;
           }
           else if(mysqli_num_rows($res)!=$q)
           {
            continue;

           }

          
}

if ($q>10) {
          	header("location:final.php");
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
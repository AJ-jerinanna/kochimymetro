<?php
include 'co.php';
session_start();
$login=$_SESSION['login'];
$usr_name=$_SESSION['username'];
$lid=$_SESSION['loginid'];
$qq = $_SESSION['q'];
$connect = mysqli_connect("localhost","root","","kochimymetro"); 
if(isset($_POST['submit']))
    {
    	 $e=$_POST['eid'];
      $j=$_POST['jobid'];
       $q=$_POST['qid'];
      $uans=$_POST['choice'];
      $ans=$_POST['ans'];

    if($ans==$uans)
     {
       $score=1;
      
     }
     

$sql="INSERT INTO `answer`(`elid`, `jobid`, `qid`, `ans`, `userans`,`score`) VALUES ('$e','$j','$q','$ans','$uans','$score')";
  }
 
$run=mysqli_query($con,$sql);
if($run)
{
++$qq;
$_SESSION['q']=$qq; 
header('location:question.php');
}

?>


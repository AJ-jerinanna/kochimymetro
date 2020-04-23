
<!DOCTYPE html>
<html>
<head>
<!--<meta charset="utf-8" />-->
<title>Login</title>
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

<div id="main">
	<form action="" method="POST">
	<label><b>Email ID :<b></label><br>
	<input type="email" name="email" id="email" placeholder="eg:abc@xyz.com" required/><br /><br />
	
	<label><b>Password  :<b></label><br>
	<input type="password" name="pass" id="pass" placeholder="**********" required/><br/><br />
    
	<input type="submit" value=" Login " name="submit"/><br />
	</form>
</div>
<footer>
    <div class="container">
      Copyright &copy; 2017, OES
    </div>
  </footer>



<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/abc.js"></script>
<script type='text/Javascript'>
 function swtalert(swlt)
                {
                  if(swlt==0)
                  {
                    swal({ type: 'error',
                         title: 'Oops!',
                         text: 'invalid login credentials' },
                         function()
                         {
                          window.location="login.php";
                         });
                  }
                  else if(swlt==2)
                  {
                    swal({ type: 'error',
                         title: 'Oops!',
                         text: 'user not found' },
                         function()
                         {
                          window.location="login.php";
                         });
                  }
                  
                  else
                  {
                    swal({ type: 'success',
                         title: '' },
                         function()
                         {
                          window.location="";
                         });
                  }
        
                }
            </script>
  
</body>
</html>
<?php  
//echo "popo";
session_start();
include("co.php");
if(isset($_POST['submit']))
{
        $a=$_POST['email'];
      $pp=$_POST['pass'];
      

$sql="select * from examlogin where username='$a'";
//echo $sql;

$result=mysqli_query($con,$sql);
$rowcount=mysqli_num_rows($result);
if($rowcount!=0)
{

  while($row=mysqli_fetch_array($result))
  {
    $dbu_name=$row['username'];
    $dbu_pass=$row['password'];
      $dbu_date=$row['examdate'];
        $id=$row['elid'];
         $lstatus=$row['lstatus'];
          $attstatus=$row['attstatus'];
    if($dbu_name==$a && $dbu_pass==$pp && $dbu_date=='2020-04-23' && $lstatus==0 && $attstatus==0 )
    {
        $_SESSION['username']=$dbu_name;
          $_SESSION['loginid']=$id;  
         //echo $dbu_type;
           $_SESSION['login']="1";
            $_SESSION['q']="1";
                header('Location: /kochimymetro/exam/homepage.php');
  
      
    }
    else
        {     echo "<script>swtalert('0');</script>";
          
    
        }
  }
}
else
{echo "<script>swtalert('2');</script>";
}
}
?>


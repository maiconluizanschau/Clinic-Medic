<?php
    include ("../database/dbconnect.php");
    if(isset($_SESSION['pharma_id'])) {
      header("location: home.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>
    The Clinic
</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../css/signin.css"/>
<script type="text/javascript" src="../css/jquery.min.js"> </script>
<script type="text/javascript" src="../css/bootstrap/js/bootstrap.min.js"> </script>
</head>

<body style="background: url('../stethoscope.jpg') no-repeat right top; background-size: cover; ">
<div class="wrapper container">
<div class="article">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        THE CLINIC
      </a>
      <a class="btn btn-danger navbar-btn" href="../index.php">Back</a>
    </div>
  </div>
</nav>
<br/> <br/>
<div class="">



    
<form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" id="ind"  >
        <h2 class="form-signin-heading" style="text-align: center; color: #fff;">Sign in </h2><br/> <br/>
           <img src="../css/img/ic_account_circle_white_24dp_2x.png" class="img-circle" alt="Account Circle" align="middle" style="height: 100px;"/>
         </h2>
        <span class="col-md-4">  </span> </br>


    <?php
        
        //$con = mysql_connect("localhost", "root", "") or die(mysqli_error());
        //$db = mysql_select_db("theclinic");

        include ("../secure.php");

         if(isset($_POST['login'])) {
            $username = $_POST['user'];
            $pass = $_POST['pass'];

            $query = mysqli_query ($db, "SELECT * FROM pharmacist WHERE username = '$username' AND pass = '$pass'");

            $result = mysqli_num_rows($query);

               
                if($result!=0) {

                  while ($row = mysqli_fetch_assoc($query)) {
                    $sysuser = $row['username'];
                    $syspass = $row['pass'];
                  

                  if($username==$sysuser && $pass==$syspass) {    

                session_start();
                $_SESSION['pharma_id']=$row['pharmacist_id'];
                //setcookie('manager_id', '$user', time() + 60 * 60, '/'); 
                header("location:home.php");
              }
             } 
           } else {
               echo "<div class='form-signin'> <p class='alert alert-danger' id='alert' role='alert'><b> Wrong username or password. Try again</b></p> </div>";
         }
      } else {
        echo mysqli_error($db);
      }
?>

 <label for="inputEmail" class="sr-only">Username</label>
          <input type="text" id="inputEmail" class="form-control" name="user" placeholder="Username" required autofocus>
          <br/>
          <label for="Password" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" /> <br>
          <label>
            <a style="color:#f44336" id="forget"> Forgot Password? </a> 
          </label><br/> <br/>
          <button class="btn btn-lg btn-success btn-block" type="submit" name="login">Sign in</button>
      </form>
</div>

  
  <div id='ubutton' style='display: none;'>
  <button class="btn btn-lg btn-danger" id="back"> Log In </button>
  <?php

    if(isset($_POST['create'])){
      $pass1 = stripcslashes($_POST['pass2']);
      $pass2 = stripcslashes($_POST['pass1']);
      $usern = stripcslashes($_POST['usern']);

      if($pass1 != $pass2) {
        echo "<div class='alert alert-warning'> Passwords do not match </div>";
      } elseif ($pass1 == $pass2){

      $ins = mysqli_query($db, "UPDATE pharmacist SET pass='$pass2' WHERE username = '".$usern."'");
      echo "<div class='alert alert-success'> Password reset. <a href='index.php'> Log In </a></div>";
        }
        
      }
  ?>
  
  <form action='' method='POST' class="form-signin" style="background: #e0f2f1;">
  <h2 class="form-signin-heading" style="text-align: center;">Reset Password </h2><br/> <br/>
  <label for="inputEmail" class="sr-only">Username</label>
     <input type="text" id="inputEmail" class="form-control" name="usern" placeholder="Username" required autofocus>
          <br/>
   <label for="Password" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass1" /> <br>
   <label for="Password" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Re-Enter Password" name="pass2" /> <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="create">Reset Password</button>
  </form>
  </div>
  </div>
  <script type="text/javascript">
    
    $('#forget').click(function() {
      $('#ind').toggle('fast', 'linear', function() {
        
      });
      $('#ubutton').show('fast', 'linear', function() {
        
      });

    });

    $('#back').click(function() {
      $('#ind').show('fast', 'linear', function() {
        
      });

      $('#ubutton').hide('fast', 'linear', function() {
        
      });

    });
  </script>
</div></div>
</body>
</html>


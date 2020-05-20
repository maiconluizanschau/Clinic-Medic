<?php
    //include ("../database/dbconnect.php");

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
<script type="text/javascript" src="../css/bootstrap/js/bootstrap.min.js"> </script>
</head>

<body>
<div class="wrapper container">
<div class="article">
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <a class="navbar-brand" href="#">The Clinic EMR</a>
 </nav>

<div class="">



    <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Enter your username and password</h2>
        <label for="inputEmail" class="sr-only">Enter ID</label>
        <input type="text" id="inputEmail" class="form-control" name="reception_id" placeholder="Your ID" required autofocus> <br/>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" class="form-control" name="user" placeholder="Username" required autofocus>
        <br/> 
        <label for="Password" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass1" required/>
        <label for="Password" class="sr-only">Re-Enter Your Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Re-Enter Your Password" name="pass2" required/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
        <hr/>
        <br/> <br/>
    </form>

        <?php

        $con = mysql_connect("localhost", "root", "") or die(mysql_error());
        $db = mysql_select_db("theclinic");

        if(isset($_POST['reception_id']) && isset($_POST['user']) && isset($_POST['pass1']) && isset($_POST['pass2'])) {

            $user = mysql_real_escape_string($_POST['reception_id']);
            $username = mysql_real_escape_string($_POST['user']);
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];

            $query1 =mysql_query("SELECT * FROM receptionist WHERE username = '$username'");

            if(mysql_num_rows($query1) > 0) {
                echo "<div class='alert alert-danger'> <p> That Username is taken </p> </div>";
            } elseif($_POST['pass1']!= $_POST['pass2']){
                echo "<div class='alert alert-danger' role='alert'><p> Your Passwords do not match </p></div>";
            } else{
                $query3 = mysql_query("UPDATE `receptionist` SET `username` = '$username', `password` = '$pass2' WHERE recep_id = '$user'");

                if(!$query3) {
                    echo mysql_error();
                } else {
                    header("location: index.php");
                    } 
        }
    }
?>


</div>
</div>
</div>
</body>
</html>



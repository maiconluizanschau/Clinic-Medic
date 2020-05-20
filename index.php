<?php
    
    require_once ("database/dbcreate.php");
    include ("database/dbconnect.php");

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>
    The Clinic
</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/signin.css"/>
<script type="text/javascript" src="css/bootstrap/js/bootstrap.min.js"> </script>
</head>

<body style="background: url('stethoscope.jpg') no-repeat right top; background-size: cover; ">
<div class="wrapper container">
<div class="article">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        THE CLINIC
      </a>
    <a class="btn btn-danger navbar-btn" href="manager/index.php">Manager</a>
    <a class="btn btn-danger navbar-btn" href="reception/index.php">Reception</a>
    <a class="btn btn-danger navbar-btn" href="pharmacy/index.php">Pharmacy</a>
    </div>
  </div>
</nav>
    
<br/> <br/> 

</div>
</div>

</body>
</html>
<?php
/*session_start();
$_SESSION['recep_id'];

if(!isset($_SESSION['recep_id'])) {
  header("location: index.php");
}*/

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>

<link rel="stylesheet" type="text/css" href="../css/mui.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
  <script type="text/javascript" src="../css/mui.min.js"></script>
</head>
<body>

  
          <div class="mui-container-fluid" id="sidenav">
          <div class="mui-row">
          <div class="mui-col-md-2">
            <div class="mui-dropdown">
            <button class="mui-btn mui-btn--primary" data-mui-toggle="dropdown">
              Patients
              <span class="mui-caret"></span>
            </button>
                  <ul class="mui-dropdown__menu mui-dropdown__menu--right">
                    <li class=""><a href="patient.php"> Add New </a> </li>
                  </ul>
                  <ul class="mui-dropdown__menu mui-dropdown__menu--right">
                    <li class=""><a href="viewpatient.php"> View Patients </a> </li>
                  </ul>
            </div> <br/> <br/> <br/> <br/><br/>
            
            <div class="mui-dropdown">
            <button class="mui-btn mui-btn--primary" data-mui-toggle="dropdown">
              Appointments
              <span class="mui-caret"></span>
            </button>
                  <ul class="mui-dropdown__menu mui-dropdown__menu--right">
                    <li class=""><a href=""> Add New </a> </li>
                  </ul>
            </div> <br/> <br/> <br/> <br/><br/>
            <div class="mui-dropdown">
            <button class="mui-btn mui-btn--primary" data-mui-toggle="dropdown">
              Services
              <span class="mui-caret"></span>
            </button>
                  <ul class="mui-dropdown__menu mui-dropdown__menu--right">
                    <li class=""><a href=""> Add New </a> </li>
                  </ul>
            </div> <br/> <br/> <br/> <br/> <br/>
            <div class="mui-dropdown">
            <button class="mui-btn mui-btn--primary" data-mui-toggle="dropdown">
              Medical Schemes
              <span class="mui-caret"></span>
            </button>
                  <ul class="mui-dropdown__menu mui-dropdown__menu--right">
                    <li class=""><a href=""> Add New </a> </li>
                  </ul>
          </div>
      </div>
      </div>
      </div>
      </div>
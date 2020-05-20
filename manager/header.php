<?php
session_start();
include ("../database/dbconnect.php");

if(!isset($_SESSION['manager_id'])) {
 header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en"> 
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manager Dashboard</title>

<link rel="stylesheet" type="text/css" href="../css/mdl/material.min.css"/>
<link rel="stylesheet" type="text/css" href="../css/mdl/grey-red.min.css"/>
<link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<script type="text/javascript" src="../css/jquery.min.js"></script> 
<script type="text/javascript" src="../css/mdl/material.min.js"></script>
<script type="text/javascript" src="../css/bootstrap/js/bootstrap.min.js"> </script>
  </head>

  <body>
   <!-- The drawer is always open in large screens. The header is always shown,
  even in small screens. -->
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
                    mdl-layout--fixed-header" id="drawer">
          <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">Manager</span>
              <!-- Add spacer, to align navigation to the right -->
              <div class="mdl-layout-spacer"></div>
              <!-- Navigation. We hide it in small screens. -->
              <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="home.php"> <img src="../css/img/ic_home_white_24dp_1x.png"/> Home</a>
                <a class="mdl-navigation__link" href="profile.php"> <img src="../css/img/ic_account_circle_white_24dp_1x.png"/> Profile</a>
                <a class="mdl-navigation__link" href="logout.php"> <img src="../css/img/eject_1x.png"> Log Out</a>
              </nav>
              <div class="mdl-layout-spacer"></div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                          mdl-textfield--floating-label mdl-textfield--align-right">
                         
                <div class="navbar-form navbar-left" role="search">
                    <div class="form-group" ><img src="../css/mdl/search_1x.png" style="padding-top: 5px;" />
                        <input class="form-control col-sm-5" type="text" name="search" id="search"> 
                    </div>
                </div>
                </div>
                
                
          </header>
          <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">The Clinic</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="schemes.php">Medical Schemes</a>
      <a class="mdl-navigation__link" href="patients.php">Patients</a>
      <a class="mdl-navigation__link" href="reports.php">Reports</a>
      <a class="mdl-navigation__link" href="consults.php">Consultations</a>
    </nav>
  </div>


  
    
<div id="search_results" style="padding-left: 25%"></div>

<script type="text/javascript" src="search.js"> 
</script>


      

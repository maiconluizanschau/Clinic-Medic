<?php

  if(isset($_POST[''])) {
    //check if values are real
    if(preg_match('%^[A-Za-z\.\'\-]{2,15}$%', stripslashes(trim($_POST['fname'])))) {
      $fn = addslashes($_POST['fname']);
    } else {
      $fn = FALSE;
    }

    if(preg_match('%^[A-Za-z\.\'\-]{2,15}$%', stripslashes(trim($_POST['lname'])))) {
      $fn = addslashes($_POST['lname']);
    } else {
      $fn = FALSE;
    }

    if(preg_match('%^[A-Za-z\.\'\-]{2,15}$%', stripslashes(trim($_POST['cname'])))) {
      $fn = addslashes($_POST['cname']);
    } else {
      $fn = FALSE;
    }

    //check if addpatname is real
    if(preg_match('%^[A-Za-z\.\'\-]{2,15}$%', stripslashes(trim($_POST['addpat'])))) {
      $fn = addslashes($_POST['addpatname']);
    } else {
      $fn = FALSE;
    }

    //check if  password is real
    if(preg_match('%^[A-Za-z\.\'\-]{2,15}$%', stripslashes(trim($_POST['pass'])))) {
      $fn = addslashes($_POST['pass']);
    } else {
      $fn = FALSE;
    }

    //check if  password is real
    if(preg_match('%^[A-Za-z\.\'\-]{2,15}$%', stripslashes(trim($_POST['pass1'])))) {
      $fn = addslashes($_POST['pass1']);
    } else {
      $fn = FALSE;
    }

    //check if  password is real
    if(preg_match('%^[A-Za-z\.\'\-]{2,15}$%', stripslashes(trim($_POST['pass2'])))) {
      $fn = addslashes($_POST['pass2']);
    } else {
      $fn = FALSE;
    }

    if(preg_match('$^[A-Za-z\.\'\-]{2,15}$%', stripslashes(trim($_POST['email'])))) {
      $fn = addslashes($_POST['email']);
    } else {
      $fn = FALSE;
    }

    if(preg_match('%^[A-Za-z\.\'\-]{2,15}$%', stripslashes(trim($_POST['addp'])))) {
      $fn = addslashes($_POST['addp']);
    } else {
      $fn = FALSE;
    }

    if(preg_match('%^[A-Za-z\.\'\-]{2,15}$%', stripslashes(trim($_POST['update'])))) {
      $fn = addslashes($_POST['update']);
    } else {
      $fn = FALSE;
    }

    if(preg_match('%^[A-Za-z\.\'\-]{2,15}$%', stripslashes(trim($_POST['ass'])))) {
      $fn = addslashes($_POST['ass']);
    } else {
      $fn = FALSE;
    }

    if(preg_match('%^[A-Za-z\.\'\-]{2,15}$%', stripslashes(trim($_POST['addpat'])))) {
      $fn = addslashes($_POST['addpat']);
    } else {
      $fn = FALSE;
    }

    if(preg_match('%^[A-Za-z\.\'\-]{2,15}$%', stripslashes(trim($_POST['login'])))) {
      $fn = escape_data($_POST['login']);
    } else {
      $fn = FALSE;
    }

    if(preg_match('%^[A-Za-z\.\'\-]{2,15}$%', stripslashes(trim($_POST['create'])))) {
      $fn = addslashes($_POST['create']);
    } else {
      $fn = FALSE;
    }

    if(preg_match('%^[A-Za-z\.\'\-]{2,15}$%', stripslashes(trim($_POST['add'])))) {
      $fn = addslashes($_POST['add']);
    } else {
      $fn = FALSE;
    }

    if(preg_match('%^[A-Za-z\.\'\-]{2,15}$%', stripslashes(trim($_POST['date'])))) {
      $fn = addslashes($_POST['date']);
    } else {
      $fn = FALSE;
    }

  }

?>

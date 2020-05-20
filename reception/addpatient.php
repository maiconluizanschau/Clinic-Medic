<?php
include "header.php"; ?>

?>

 <main class="mdl-layout__content" style="padding-left: 5%;">

 <?php 

 	include "../secure.php";
 	if(isset($_POST['addpat'])) {
 		$fname = $_POST['fname'];
 		$lname = $_POST['lname'];
 		$dob = $_POST['dob'];
 		$address = $_POST['address'];
 		$contact = $_POST['contact'];
 		$dep = $_POST['dep'];
 		$condep = $_POST['condep'];

 		$query = mysqli_query($db, "INSERT INTO patients (fname, lname, dob, address, contact, dependent, dependent_contact) VALUES ('".$fname."', '".$lname."', '".$dob."', '".$address."', '".$contact."', '".$dep."', '".$condep."')");

 		if($query) {
 			echo "<p> <b> Operation successfull<b>. <a href='viewpatient.php'> View patients </a> </p>";
 		} else {
 			echo mysqli_error($db);
 		}
 	} ?>

</main>
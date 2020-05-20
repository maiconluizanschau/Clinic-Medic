<?php
session_start();
include ("../database/dbconnect.php");

if(!isset($_SESSION['recep_id'])) {
 header("location: index.php");
}
if(isset($_GET['search_term'])) {

	$get = stripcslashes($_GET['search_term']);

	$search1 = mysqli_query($db, "SELECT * FROM patients JOIN medical_schemes ON patients.scheme_id = medical_schemes.scheme_id WHERE patients.fname LIKE '%$get%'");
	$search2 = mysqli_query($db, "SELECT * FROM patients JOIN medical_schemes ON patients.scheme_id = medical_schemes.scheme_id WHERE patients.lname LIKE '%$get%'");
	
	echo "<h3> Search Results </h3>";
	if(mysqli_num_rows($search1) == 1) {

		while ($row = mysqli_fetch_assoc($search1)) {

								$id = $row['patient_id'];

								echo "<b>Patient Name :</b> <a href='patprof.php?prof=$id'>" .$row['fname']. " " .$row['lname']. " </a><br/>";
								echo "<b>Medical Scheme :</b> " .$row['scheme_name']. " <br/>";
								echo "<br/> <hr/>";
								//echo "<b> Medical Scheme: </b>" . $row['scheme_name'] . "<br/>";
									} 
								} 
	if(mysqli_num_rows($search2) == 1) {

				while ($row = mysqli_fetch_assoc($search2)) {
								$id = $row['patient_id'];

								echo "<b>Patient Name :</b> <a href='patprof.php?prof=$id'>" .$row['fname']. " " .$row['lname']. " </a><br/>";
								echo "<b>Medical Scheme :</b> " .$row['scheme_name']. " <br/>";
								echo "<br/> <hr/>";
									}
								}

							} ?>


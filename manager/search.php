<?php
session_start();
include ("../database/dbconnect.php");

if(!isset($_SESSION['manager_id'])) {
 header("location: index.php");
}
if(isset($_GET['search_term'])) {

	$get = stripcslashes($_GET['search_term']);

	$search1 = mysqli_query($db, "SELECT * FROM patients JOIN medical_schemes ON patients.scheme_id = medical_schemes.scheme_id WHERE patients.fname LIKE '%$get%'");
	$search2 = mysqli_query($db, "SELECT * FROM medical_schemes JOIN provider ON medical_schemes.provider_id = provider.provider_id WHERE scheme_name LIKE '%$get%'");
	$search2 = mysqli_query($db, "SELECT * FROM medical_schemes JOIN provider ON medical_schemes.provider_id = provider.provider_id WHERE provider LIKE '%$get%'");
	$search2 = mysqli_query($db, "SELECT * FROM medical_schemes JOIN provider ON medical_schemes.provider_id = provider.provider_id WHERE scheme_type LIKE '%$get%'");
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
	if(mysqli_num_rows($search2) >= 1) {

				while ($row = mysqli_fetch_assoc($search2)) {

								

								echo "<b>Scheme:</b> " .$row['scheme_name']. " <br/>";
								echo "<b>Type:</b> " .$row['scheme_type']. " <br/>";
								echo "<b>Provider:</b> " .$row['provider_name']. " <br/>";
								echo "<b>Validity:</b> " .$row['validity']. " <br/>";
								echo "<br/> <hr/>";
									}
								}

							} ?>


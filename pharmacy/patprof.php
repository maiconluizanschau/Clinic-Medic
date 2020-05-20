<?php
	include "header.php";

	
?>

 <main class="mdl-layout__content" style="padding-left: 5%;" id="home">
<script type="text/javascript">
	 	
 		$('#search').click(function() {
 			$('#home').toggle('fast', 'linear', function() {
 				
 			});
 		});
 	</script>
 	<div class="mdl-layout-spacer"></div>
	<div class="mdl-grid">

	
		<div class="mdl-cell mdl-cell--7-col">

		<nav aria-label="...">
		  <ul class="pager">
		    <li class="previous"><a href="patients.php"><span aria-hidden="true">&larr;</span> Back </a></li>
		    
		  </ul>
		</nav>

		<?php
				if(isset($_GET['prof'])){
					$id = $_GET['prof'];
					$profile = mysqli_query($db, "SELECT patients.fname, patients.lname, patients.sex, patients.contact, patients.address, patients.dependent, patients.dependent_contact, medical_schemes.scheme_name, provider.provider_name FROM patients, medical_schemes, provider WHERE patients.scheme_id = medical_schemes.scheme_id AND patients.patient_id = '$id' AND medical_schemes.provider_id = provider.provider_id");
					if(mysqli_num_rows($profile) == 1) {

						while ($row = mysqli_fetch_assoc($profile)) {

								

								echo "<b>Name :</b> " .$row['fname']. " " .$row['lname']. " <br/>";
								echo "<b>Gender :</b> " .$row['sex']. " <br/>";
								echo "<b>Contact :</b> " .$row['contact']. " <br/>";
								echo "<b>Address :</b> " .$row['address']. " <br/>";
								echo "<b>Dependent :</b> " .$row['dependent']. " <br/>";
								echo "<b>Dependent Contact :</b> " .$row['dependent_contact']. " <br/>";
								echo "<b>Medical Scheme :</b> " .$row['scheme_name']. " <br/>";
								echo "<b>Provider :</b> " .$row['provider_name']. " <br/>";
								
								//echo "<b> Medical Scheme: </b>" . $row['scheme_name'] . "<br/>";
									} 
								}
				}?>
				</div>
				</div>
				</main>
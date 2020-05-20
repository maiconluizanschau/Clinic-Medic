<?php
include "header.php";
?>

<main class="mdl-layout__content" style="padding-left: 2%;" id="home">
<script type="text/javascript">
	 	
 		$('#search').click(function() {
 			$('#home').toggle('fast', 'linear', function() {
 				
 			});
 		});
 	</script>
<div class="mdl-layout-spacer"></div>
	<div class="mdl-grid">
	<div class="mdl-cell mdl-cell--5-col"">

	<?php 

 	include "../secure.php";
 	if(isset($_POST['add'])) {
 		$service = $_POST['service'];
 		$charge = $_POST['charge'];

 		
 		$query = mysqli_query($db, "INSERT INTO services (service_name, charge) VALUES ('".$service."', '".$charge."')");

 		if($query) {
 			echo "<div class='alert alert-success'> Service added </div>";
 		} else {
 			echo mysqli_error($db);
 		}
 	} ?>

	<input type='button' class='btn btn-primary' value='Add Service' id='ubutton'/>
 	<div id='upass' style='display: none;'>
 	<form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>' method='POST'>
 	<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
 	<input class='mdl-textfield__input' type='text' name='service' required='' />
 	<label for='service' class='mdl-textfield__label'> Service: </label>
 	</div>
 	<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
 	<input class='mdl-textfield__input' type='text' name='charge' required=''/>
 	<label for='charge' class='mdl-textfield__label'> Charge: </label>
 	</div> <br/> <br/>
 	<button class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored' type='submit' name='add'> Submit </button>
 	</form>
 	</div>
 	</div>
	

	<script type="text/javascript">
	 	//$(document).ready(function(){
	 	//	$('#upass').hide();
	 	//})
 		$('#ubutton').click(function() {
 			$('#upass').toggle('fast', 'linear', function() {
 				
 			});
 		});
 	</script>

	<div class="mdl-cell mdl-cell--7-col" style="padding-left: 4%;">
		<h3> Services </h3>

		<?php
		include ("../database/dbconnect.php");
	            $services = mysqli_query($db, "SELECT * FROM `services`");
            
                if($services) {
                	$result = mysqli_num_rows($services);

	                echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--3dp'>
                    <thead>
                    <tr>
					<th class='mdl-data-table__cell--non-numeric'> Name </th>
					<th class='mdl-data-table__cell--non-numeric'> Price </th>
					
					</tr>
			        </thead>";

						//change this
			        
			    while ($rows = mysqli_fetch_array($services)) {

			        echo "<tbody>";
					echo "<tr>";
					echo "<td class='mdl-data-table__cell--non-numeric'>". $rows['service_name'] . "</td>"; 
					echo "<td class='mdl-data-table__cell--non-numeric'>". $rows['charge'] . "</td>"; 
					 
					echo "</tr>";
			        echo "</tbody>";
			       }
			      }

				echo "</table>";

			?>
		</div>
		</div>
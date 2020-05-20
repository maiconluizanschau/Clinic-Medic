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
	<div class="mdl-cell mdl-cell--6-col">

		<h3> Scheme List </h3>

		<?php
		include ("../database/dbconnect.php");
	            $scheme = mysqli_query($db, "SELECT * FROM `medical_schemes` JOIN provider ON medical_schemes.provider_id = provider.provider_id ORDER BY scheme_name");
            
                if($scheme) {
                	$result = mysqli_num_rows($scheme);

	                echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--3dp'>
                    <thead>
                    <tr>
					<th class='mdl-data-table__cell--non-numeric'> Name </th>
					<th class='mdl-data-table__cell--non-numeric'> Type</th>
					<th class='mdl-data-table__cell--non-numeric'> Provider</th>
					</tr>
			        </thead>";

						//change this
			    while ($rows = mysqli_fetch_array($scheme)) {

			        echo "<tbody>";
					echo "<tr>";
					echo "<td class='mdl-data-table__cell--non-numeric'>". $rows['scheme_name'] . "</td>"; 
					echo "<td class='mdl-data-table__cell--non-numeric'>". $rows['scheme_type'] . "</td>"; 
					echo "<td class='mdl-data-table__cell--non-numeric'>". $rows['provider_name'] . "</td>"; 
					echo "</tr>";
			        echo "</tbody>";
			       }
			      }

				echo "</table>";

			?>
		</div>
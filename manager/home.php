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
		<div class="page-content">
		<div class="mdl-layout-spacer"></div>
		<div class="mdl-layout-spacer"></div>
		<br/> <br> <br>

		<div class="mdl-grid">
		  <div class="mdl-cell mdl-cell--3-col" style="text-align: center;">
		  <img src="../css/img/ic_folder_black_24dp_2x.png" alt="Add Scheme" align="middle" style="height: 73px;"> <br/>
		    <a href="schemes.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"> Add Scheme</a>
		  </div>
		  <div class="mdl-cell mdl-cell--3-col" style="text-align: center;">
		  <img src="../css/img/ic_local_pharmacy_black_36dp_2x.png" alt="Medical Schemes" align="middle" style="height: 73px;"> <br/>
		    <a href="schemes.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Medical Schemes </a>
		  </div>
		  <div class="mdl-cell mdl-cell--3-col" style="text-align: center;">
		  <img src="../css/img/ic_local_pharmacy_black_36dp_2x.png" alt="Consultations" align="middle" style="height: 73px;"> <br/>
		    <a href="consults.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"> Consultations</a>
		  </div>
		  <div class="mdl-cell mdl-cell--3-col" style="text-align: center;">
		  <img src="../css/img/ic_assignment_black_24dp_2x.png" alt="Reports" align="middle" style="height: 73px;"> <br/>
		    <a href="reports.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"> Reports</a>
		  </div>
		</div>


</div> 	
  
</main>


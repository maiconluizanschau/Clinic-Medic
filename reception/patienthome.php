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
  <img src="../css/img/account_circle_black_36dp_2x.png" alt="Add Patient" align="middle"> <br/>
    <a href="patient.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"> Add Patient</a>
  </div>
  <div class="mdl-cell mdl-cell--3-col" style="text-align: center;">
  <img src="../css/img/account_circle_black_36dp_2x.png" alt="Add Patient" align="middle"> <br/>
    <a href="viewpatient.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Patients List</a>
  </div>
  <div class="mdl-cell mdl-cell--3-col" style="text-align: center;">
  <img src="../css/img/ic_folder_black_24dp_2x.png" alt="Add Patient to scheme" align="middle" style="height: 73px;"> <br/>
    <a href="patscheme.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"> Add Patient To Scheme</a>
  </div>
</div>


</div>
</main>
<?php 

require_once "../../../../Model/admin/model_admin_Bus.php";

require_once "../../../../Model/admin/model_admin_Company.php";



// Assuming the necessary 'require_once' statements for models are already included

$table = [];

if (isset($_GET["table"])) {
    $table[] = $_GET["table"];
}

// If the "table" parameter contains comma-separated values
if (!empty($table)) {
    $values = explode(',', $table[0]); // Split the string into an array based on commas
}

$AdminBus = new AdminBus();
$Bus = $AdminBus->getAllBus();

// print_r($Bus);
// print_r($values);

if (!empty($values) && !empty($Bus)) {
  $matchingBusNumbers = []; // Initialize an array to store matching bus numbers
  
  foreach ($Bus as $bus) {
      if (in_array($bus["Company_id"], $values)) {
          $matchingBusNumbers[] = $bus["Numero_de_bus"]; // Store matching bus numbers in the array
          // Perform additional actions if needed
      }
  }

  // Output or use the $matchingBusNumbers array

  echo json_encode($matchingBusNumbers);

}


<?php
header("Content-type:application/json");

include("addApi.php");

$api = new API();

if($_GET["action"] == 'fetchData'){
    $data = $api->outputData();
}
if($_GET["action"] == 'insert'){
    $data = $api->addData();
}

echo json_encode($data);
?>
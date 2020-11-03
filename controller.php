<?php
//controller file for insertion of the data

if(isset($_POST["action"])){
    if($_POST["action"] == 'insert'){
        $data = array(
            'sensor_id'     => $_POST["sensor_id"],
            'result'      => $_POST["result"]
        );
        $client = curl_init('http://ionenergy.solutions/webhook/api_test.php?action=insert');
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
 
    }
}

?>



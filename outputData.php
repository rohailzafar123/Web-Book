<?php

//outputData file for fetching data from database in table

$client = curl_init('http://ionenergy.solutions/webhook/api_test.php?action=fetchData');
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($client);
$result = json_decode($response);

$output = '';

if($result > 0){
    foreach($result as $row){
        $output .= '
            <tr>
                <td align="center" style="display:none !important;">'.$row->id.'</td>
                <td align="center">'.$row->date_posted.' '.$row->time_posted.'</td>
                <td align="center">'.$row->sensor_id.'</td>
                <td align="center">'.$row->result.'</td>
            </tr>
        ';
    }
}else{
    $output .= '<tr><td colspan="4" align="center">No Data found!</td></tr>';
}

echo $output;
?>


<?php

class API{
    private $conn = '';

    function __construct(){
        $this->dbConnection();
    }

    function dbConnection(){
        $username = "ionwebhook";
        $password = "ionwebhook";
        $this->conn = new PDO("mysql:host=localhost;dbname=ion_webhookDB", $username, $password);
    }

    function outputData(){
        $select = $this->conn->prepare("SELECT * FROM data ORDER BY id DESC ");
        if($select->execute()){
            while($row = $select->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
            return $data;
        }
    }

    function addData(){
        $msg['message'] = '';

        if(isset($_POST["sensor_id"])){
            
            $data = array(
                ':sensor_id' => $_POST["sensor_id"],
                ':result' => $_POST["result"]
            );
             date_default_timezone_set('America/Kentucky/Louisville');
            //for time
            $time = strftime("%X");
        
            //for date
            $date = strftime("%B %d, %Y");

            $insert = $this->conn->prepare("INSERT INTO `data`(date_posted, time_posted, sensor_id, result) VALUES ('$date','$time',:sensor_id, :result)");
            
            if($insert->execute($data)){
                $msg['message'] = 'Data Inserted Successfully';
            }else{
                $msg['message'] = 'Data not Inserted';
            } 
        }

    }
}

?>


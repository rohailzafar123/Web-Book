<html>
	<head>
		<title>PHP Task</title>
  		
	<script type=text/javascript> </script><script type=text/javascript> </script><script type=text/javascript> </script><script type=text/javascript> </script></head>
	
	<?php

		include 'connection.php';
		session_start(); 
	

		//checking user login
		if($_SESSION['user'])
		{ 
		}
		// redirecting if user is not login
		else{
			header("location:index.php"); 
		}

		//assigns user value
		$user = $_SESSION['user']; 
	?>

	<body>
		<h2>Home Page</h2>

		<p>Welcome: <?php Print "$user"?>!</p> 

		
<style>
th {
    text-align: center ;
}
td{
	background:#fff  !important;
	color:#000  !important;
	text-align:center  !important;
}
tbody{
	border-radius:25px;
	border-width:2px;
}

</style>
<div class="">
		<table id="myTable" class="table table-strped" border="1px" width="100%"style="">
			<tr style="background:#000;color:#fff;text-align:center;">
				<th align="center" id="device-id" style="display:none !important;" style="">Device ID</th>
				<th align="center">Date & Time (UTC−05:00)</th>
				<th align="center" >Sensor ID </th>
				<th align="center" >Result (if false, then Reason)</th>
			</tr>

			<tbody class="tbody">
				
			</tbody>
		</table>
</div>

	<script>
        $(document).ready(function(){
        	outputData();
            
            function outputData(){
                $.ajax({
                    url: "outputData.php",
                    success:function(data){
                        $('.tbody').html(data);
                    }
                });
            }
            
            setInterval(outputData, 1000);

            $('#add_api_form').on('submit', function(event){
                event.preventDefault();
                    var formData = $(this).serialize();
                    $.ajax({
                        url: "controller.php",
                        method: "POST",
                        data: formData,
                        success:function(data){
                            outputData();
                        }
                    });
                
            });
        });
	</script>

	</body>
</html>





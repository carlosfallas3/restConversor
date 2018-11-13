<?php 
$resul ="";
try {

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	    if (isset($_POST['de']) && isset($_POST['a']) && isset($_POST['convertir']))
	    {
	   		$convert = $_POST['convertir'];
			$convertDe = $_POST['de'];	
			$convertA = $_POST['a'];

			if($convert!=""){
				if($convertDe > $convertA){
					$result = $convert * ($convertDe / $convertA);
				}else{
					$result = ($convert / $convertA) * $convertDe;
				}	
				$response['result'] = $result;
				header("HTTP/1.1 200 OK");
				echo json_encode($response);
			}
			else{
				$result ="(error:dato a convertir no ingresado!)";
				$response['result'] = $result;			
				header("HTTP/1.1 500 error");
				echo json_encode($response);			
			}
			
	    }

	 }
} catch (Exception $e) {
	$response['result'] = $e;
	echo json_encode($response);
}
?>
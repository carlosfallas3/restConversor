<!DOCTYPE html>
<html>
<head>
	<title>Conversor</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class="row">
		<div class="col-md-12">
			<fieldset>
				<div>Unidadades de Medida</div>
				<div>De: <select id="deId">
					<option value="1000">Km</option>
					<option value="100">Hm</option>
					<option value="10">dam</option>
					<option value="1">m</option>
					<option value="0.1">dm</option>
					<option value="0.01">cm</option>
					<option value="0.001">mm</option>
				</select></div>
				<div>a: <select id="aId">
					<option value="1000">Km</option>
					<option value="100">Hm</option>
					<option value="10">dam</option>
					<option value="1">m</option>
					<option value="0.1">dm</option>
					<option value="0.01">cm</option>
					<option value="0.001">mm</option>
				</select></div>
				<div><input type="number" name="convertir" placeholder="1.00"></div>
				<button type="button" onclick="convertir();" class="btn btn-default">Convertir</button>
				<div id="resultado">
					
				</div>

			</fieldset>
		</div>
	</div>
<script type="text/javascript">

	function convertir(){
		 var getUrl = window.location;
		 var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
		 $.ajax({
		    url: baseUrl+'restService/restService.php', //hubicación del servicio rest
		    type: "POST",
		    data: { de : $("#deId").val(), a: $("#aId").val(), convertir: $("[name=convertir]").val() },
		    dataType:'json',

		    success: function (response) {
		       $("#resultado").html("Resultado: <p>"+response.result+"</p>");
		    },
		    error: function(error){
		         $("#resultado").html("Response:<p Style='color:red'>"+error.responseText+"</p>");
		    } 
		});
	}
</script>
</body>
</html>
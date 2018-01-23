<?php
include_once('validar.php');
$consulta = laConsulta();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Top10</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  	<link rel="stylesheet" href="css/main.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<body>
    <section class="text-center"> 
    <div class="row" >
    	<div class="col-xs-12" >
    		<h3>Top 10 Noticias </h3>
    		<table class="table table-striped" >
    			<thead>
    				<tr>
    					<th width="100">ID</th>
    					<th width="250">Titulo</th>
    					<th width="200">Fecha</th>
    					<th width="200">Contador</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php
    				while($data=$consulta->fetch_assoc()){
    				?>
    					<tr>
    						<td><?php echo $data['Id_data']; ?></td>
    						<td><?php echo $data['Titulo_data']; ?></td>
    						<td><?php echo $data['fecha_data']; ?></td>
    						<td><?php echo $data['Contador_data']; ?></td>
    					</tr>
    				<?php		
    				}
    				?>
    			</tbody>
    		</table>
    	</div>
    </div>
    </section>
</body>
</html>
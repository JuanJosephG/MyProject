<?php
include_once('validar.php');
$consulta = laConsulta();
?>

<?php
$GLOBALS['THRIFT_ROOT']= 'C:\\xampp\\htdocs\\PaginaNews\\thrift\\thrift-0.11.0\\lib\\php\\lib';
require_once "thrift/gen-php/Types.php";
require_once "thrift/gen-php/Servidor.php";

require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Transport/TTransport.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Transport/TSocket.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Protocol/TProtocol.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Protocol/TBinaryProtocol.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Transport/TBufferedTransport.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Type/TMessageType.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Factory/TStringFuncFactory.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/StringFunc/TStringFunc.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/StringFunc/Core.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Type/TType.php';
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TBufferedTransport;
use Thrift\Transport\TSocket;
use Thrift\Transport\TSocketPool;
use Thrift\Transport\TFramedTransport;


$host='13.58.55.118';
$port='3306';
$socket= new Thrift\Transport\TSocket($host,$port);
$transport= new TBufferedTransport($socket);
$protocol= new TBinaryProtocol($transport);
$cliente= new ServidorClient($protocol);
$transport->open();
?>
<html lang="en">
<head>
  <title>Bootstrap 4 Example</title>
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
    <div class="jumbow3-container jumbotron justify-content-md-center w3-mobile">
      	<h1>Proyecto de Sistemas Distribuidos</h1>
      	<img src="img/logo.png" align="left">
        <div class="col sombra" align="center" >
	        <p class="lead" >Grupo #7:	</p>
	        <div class="" align="center">
				<li class="lead">Sergio Basurto</li>
				<li class="lead">Juan Guerrero</li>
				<li class="lead">Pablo Rugel</li>
			</div>
			<form action="validar.php" method="post">
		        <a type=submit name="boton1" class="btn btn-lg btn-primary" href="../../components/navbar/" >Top 10 Noticias &raquo;
		        </a>
		    </form>
        </div>
    </div>
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


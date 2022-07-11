<?php

/*
CRUD con PostgreSQL y PHP
================================
Este archivo lista todos los
datos de la tabla, obteniendo a
los mismos como un arreglo PDO::FETCH_UNIQUE
================================
*/
?>

<?php
	include_once "configuracion.php";
	$sql1 = $databasePDO->query("SELECT tipo_mov FROM inventario");
	$resultados = $sql1->fetchAll(PDO::FETCH_OBJ);


	$sql2 = $databasePDO->query("SELECT causa FROM inventario");
	$resultados2 = $sql2->fetchAll(PDO::FETCH_OBJ);
	

	##$unicos = array_unique($resultados);  $valores = array_count_values($array);


?>


<div>
	<div>
		<h1>Graficas</h1>
		<br>
		<div>
					<?php 
					
					$json_mov=[];
					$prueba_mov=[];
				
					
					foreach($resultados as $inventario ){ 
						
						//$json_mov[] = $inventario->tipo_mov;

						$prueba_mov[] = $inventario->tipo_mov 
					
						?>
						
                	
					<?php } 
					//echo json_encode($json_mov);

					$arreglo_FRM = array_count_values($prueba_mov);
					//echo json_encode($arreglo_FRM);

					$tipo_frm = array_keys($arreglo_FRM);
					$frm_valor = array_values($arreglo_FRM);

					echo json_encode($tipo_frm);
					echo json_encode($frm_valor);


					?>

					<?php 
					
					$json_causa=[];
					$prueba_causa=[];
								
					foreach($resultados2 as $inventario ){ 
						
						//$json_mov[] = $inventario->tipo_mov;

						$prueba_causa[] = $inventario->causa
					
						?>
						
                	
					<?php } 
					//echo json_encode($json_mov);

					$arreglo_causa= array_count_values($prueba_causa);
					//echo json_encode($arreglo_FRM);

					$tipo_causa = array_keys($arreglo_causa);
					$causa_valor = array_values($arreglo_causa);

					echo json_encode($tipo_causa);
					echo json_encode($causa_valor);


					?>


		</div>
	</div>
</div>

<br>


<!--<a href="../proyecto_final.html">Volver al geovisor</a> -->





		
<!DOCTYPE html>
<html>
<head>
	<title> Graficas </title>
</head>

<body>
 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script src="/Proyecto_final/lib/jquery/jquery-3.4.1.js"></script>

	<div id="canvas-holder" style="width:40%">
		 <canvas id="pie-chart" style="width:40%" ></canvas>
	     <style>
		canvas{
  			border: 1.5px solid black;
		      }
	     </style>
	</div>

	<div id="canvas-holder" style="width:40%">
	    <canvas id="bar-chart2" style="width:40%" ></canvas>
	     <style>
		canvas{
  			border: 1.5px solid black;
		      }
	     </style>
	</div>



	<script>

	new Chart(document.getElementById("pie-chart"), {
        type: 'pie',
        data: {
      	labels: <?php echo json_encode($tipo_frm); ?>,

      	datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: <?php echo json_encode($frm_valor); ?>
                  }]
    	    },
    options:{
      	title: {
        display: true,
        text: 'Diagrama Torta de Movimientos en Masa'
               }
            }
    });
	
	//BARCHART
	new Chart(document.getElementById("bar-chart2"), {
        type: 'bar',
        data: {
      	labels: <?php echo json_encode($tipo_causa); ?>,

      	datasets: [{
        label: "Eventos-Causa",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: <?php echo json_encode($causa_valor); ?>
                  }]
    	    },

    options:{
	
      	title: {
           display: true,
           text: 'Barplot de causas'
               }
         ,

	    scales: {
         yAxes: [{
         ticks: {
            stepSize: 1,
			beginAtZero: true
         }
      }]
   }


            }
    });
    
	
	</script>
   
<body>



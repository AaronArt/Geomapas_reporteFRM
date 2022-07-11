<?php
  
  //Una forma facil de validar que la pagina se abrio desde la pagina anterior y si esta logueado en el sistema
  if( ($_GET['logueado']=='si') AND isset($_SERVER['HTTP_REFERER']))
  {

  }
else
	{
		die('No autorizado para acceder por este medio !  
		<a href="index.php">volver</a>');
	}
  //metodo para iniciar las variables de  session
  session_start();
?>


<!DOCTYPE html>
<html>
<head>
	
	<title>Pagina protegida</title>
	
</head>
<body>



	<!-- enlace para salir -->

	<a href="index.php?op=salir">Salir del Aplicativo</a><br>
	<?php 
	 // echo 'Este es rol del usuario logueado : '.$_SESSION["rol"];
	 // echo '<br>';
	 // echo 'Este es id del usuario logueado  : '.$_SESSION["iduser"];
	  //echo '<br>';

	  if ($_SESSION["rol"] == '1')
	  {

		  //header('Location: /Proyecto_final/pagina_admin.html');
	?>
	
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Proyecto_final/css/estilo1.css">
    <script src="https://kit.fontawesome.com/0458944bda.js" crossorigin="anonymous"></script>
	
	<title>proyecto_final </title>
	<link rel="stylesheet" href="/Proyecto_final/lib/leaflet/leaflet.css" />
	<script src="/Proyecto_final/lib/leaflet/leaflet.js"></script>
	
	<link rel="stylesheet" href="/Proyecto_final/lib/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.min.css" />
	<script src="/Proyecto_final/lib/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.min.js"></script>
	
	<link rel="stylesheet" href="/Proyecto_final/lib/leaflet-easybutton/easy-button.css" />
    <script src="/Proyecto_final/lib/leaflet-easybutton/easy-button.js"></script>

     <!-- MEDIR -->
     <link rel="stylesheet" href="/Proyecto_final/lib/leaflet.measure-master/leaflet.measure.css"/>
     <script src="/Proyecto_final/lib/leaflet.measure-master/leaflet.measure.js"></script>
     <style>
       * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
       }
 
       html, body, #elMap {
         width: 100%;
         height: 100%;
       }
     </style>
     
    <!-- importar libreria JQuery -->
	<script src="/Proyecto_final/lib/jquery/jquery-3.4.1.js"></script>
	 
	 <!-- coordenadas en mapa-->
	<link rel="stylesheet" href="/Proyecto_final/lib/Leaflet.MousePosition-master/src/L.Control.MousePosition.css"/>
     <script src="/Proyecto_final/lib/Leaflet.MousePosition-master/src/L.Control.MousePosition.js"></script>


	<!-- localizacion-->

	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/Proyecto_final/lib/dist/L.Control.Locate.min.css">
	<script src="/Proyecto_final/lib/dist/L.Control.Locate.min.js"></script>


	<!-- leyenda WMS-->
	<link rel="stylesheet" href="/Proyecto_final/lib/leaflet-wms-legend-master/leaflet.wmslegend.css"/>
	<script src="/Proyecto_final/lib/leaflet-wms-legend-master/leaflet.wmslegend_mymap.js"></script>
	

	  <!-- leaflet-control-condensed -->
	<link rel="stylesheet" href="/Proyecto_final/lib/Leaflet.CondensedAttribution-master/dist/leaflet-control-condended-attribution.css" />
	<script type="text/javascript" src="/Proyecto_final/lib/Leaflet.CondensedAttribution-master/dist/leaflet-control-condended-attribution.js"></script>


  <!-- cluster -->
  <link rel="stylesheet" href="/Proyecto_final/lib/leaflet-markercluster/MarkerCluster.css" />
  <link rel="stylesheet" href="/Proyecto_final/lib/leaflet-markercluster/MarkerCluster.Default.css" />
  <script src="/Proyecto_final/lib/leaflet-markercluster/leaflet.markercluster.js"></script>



	<!-- Importtar la libreria  jQuery Modal -->
	<!-- Se esta usando un CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


    <!--  CSS -->
	<style>
		table, th, td {
  			border: 1px solid black;
		}
	</style>
   

      <!-- the demo-specific code -->
  <style type="text/css">
    body { padding: 0; margin: 0; }
    html, body, #map { height: 100%; }
    .leaflet-container .leaflet-control-attribution {
      border-radius: 26px;
    }
    .leaflet-control-attribution .attributes-body {
      height: 36px;
      line-height: 36px;
    }
    .leaflet-control-attribution .attributes-emblem {
      height: 36px;
      width: 36px;
    }
    .emblem-wrap, .emblem-wrap img {
      height: 20px;
    }
  </style>

    
    
</head>

<body>

    <!-- FORMULARIO HTML PARA INGRESAR DATOS A LA BD -->
	<div id="ventana-reporte" class="modal">
		<p>Reportar por coordenadas</p>
		<form>
			<label for="cx_form">Coordenada X:</label><br>
			<input type="text" id="cx_form" name="cx_form" ><br>
			<label for="cy_form">Coordenada Y:</label><br>
			<input type="text" id="cy_form" name="cy_form" ><br>
			
			<label for="movimiento_form">Tipo de movimiento:</label><br>
			<select id="movimiento_form" name="movimiento_form" >
			<option value="Caida">Caida </option>
			<option value="Volcamiento">Volcamiento </option>
			<option value="Deslizamiento rotacional">Deslizamiento rotacional </option>
			<option value="Deslizamiento translacional">Deslizamiento translacional </option>
			<option value="Flujo">Flujo</option>
			<option value="Complejo">Complejo</option>
			</select>
			<br>

			<label for="material_form">Materiales:</label><br>
			<select id="material_form" name="material_form" >
			<option value="Roca">Roca </option>
			<option value="Escombros">Escombros</option>
			<option value="Tierra">Tierra</option>
			</select>
			<br>
			
			<label for="causa_form">Causa:</label><br>
			<select id="causa_form" name="causa_form" >
			<option value="Lluvias">Lluvias </option>
			<option value="Erosion">Erosion</option>
			<option value="Corte talud">Corte talud</option>
			<option value="Sismo">Sismo</option>
			<option value="Desconocido">Desconocido</option>
			</select>
			<br>

			<label for="afectados_form">Afectados:</label><br>
			<select id = "afectados_form" name="afectados">
			   <option value = "1"> Afectados </option>
			   <option value = "0"> Sin afectados </option>
			</select>
			<br>
	
			<label for="observaciones_form">Observaciones:</label><br>
			<input type="text" id="observaciones_form" name="observaciones_form" ><br>

			<br>
			<input type="button" id="boton-envio-reporte" value="Enviar Reporte">
		  </form>
		  <div id="div_mensaje_ventana_reporte"></div>
	</div>

    <header class="header">
        <div class="container logo-nav-container">
            <a href="https://www.univalle.edu.co/" class="logo"><img src="https://tierrabaja.files.wordpress.com/2017/03/univalle-logo-01.png?w=901" width="80"
     height="90"></a>
            <span class="menu-icon">Ver menú</span>
        
            <nav class="navigation">

			
                <ul class="show">

				   
                    <li><a href="/Proyecto_final/src/graficas.php">Graficas</a></li>
                    <li><a href="#ventana-reporte" rel="modal:open">Registrar </a></li>
                    <li><a href="/Proyecto_final/src/form_read.php">Ver </a></li>
                    <li><a href="/Proyecto_final/src/form_update.php">Actualizar</a></li>
					<li><a href="/Proyecto_final/src/form_delete.php">Eliminar</a></li>
					<!--<li><a href="/Proyecto_final/src/index.php">Login</a></li> -->
					<li><a href="index.php?op=salir">Salir</a></li>
					<li> <?php echo $_SESSION["usuario"]?> </li>
                     <!-- Link para abir la ventana modal $_SESSION["iduser"]  -->
                    

                    
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <h1>GEOVISOR FRM</h1>
        
        <!-- ESPACIO PARA MAPA    /position: absolute; width: 100%; height: 80%;;-->
        <div id="mapid" style="width: 100%; height: 600px; z-index:0;"></div>
        <div id="mensaje_que_cambia"></div>

  	

  <hr>      
<script>       
        
        var basemaps = 
{
    Streets: L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', 
{
	maxZoom: 19,
	attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}),

Opentopo: L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', 
{
	maxZoom: 18,
	attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
})


};


var wms_comunas = L.tileLayer.wms('http://idesc.cali.gov.co:8081/geoserver/wms?service=WMS&version=1.1.0', 
{
layers: 'idesc:mc_comunas',
attribution: 'Creditos de la capa',
format: 'image/png',
transparent: true
});

var wms_corregimientos = L.tileLayer.wms('http://idesc.cali.gov.co:8081/geoserver/wms?service=WMS&version=1.1.0', 
{
layers: 'idesc:mc_corregimientos',
attribution: 'Creditos de la capa',
format: 'image/png',
transparent: true
});

var wms_centros_poblados = L.tileLayer.wms('http://idesc.cali.gov.co:8081/geoserver/wms?service=WMS&version=1.1.0', 
{
layers: 'pot_2014:bcs_centros_poblados',
attribution: 'Creditos de la capa',
format: 'image/png',
transparent: true
});

var wms_FGS = L.tileLayer.wms('http://localhost:8082/geoserver/wms?service=WMS', 
{
layers: 'proyecto_final:fgs',
attribution: 'Creditos de la capa',
format: 'image/png',
transparent: true

});

var wms_FRM_amz = L.tileLayer.wms('http://localhost:8082/geoserver/wms?service=WMS', 
{
layers: 'proyecto_final:amz_mm',
attribution: 'Creditos de la capa',
format: 'image/png',
transparent: true
});

var mymap = L.map('mapid',
{
zoom: 10
}).setView([3.42335,-76.52086], 13);



basemaps.Streets.addTo(mymap);

wms_comunas.addTo(mymap);
wms_corregimientos.addTo(mymap);
wms_centros_poblados.addTo(mymap);
wms_FGS.addTo(mymap);
wms_FRM_amz.addTo(mymap);



var groupedOverlays = {
"Carto base": {
"Comunas": wms_comunas,
"Corregimientos": wms_corregimientos,
"Centros Poblados": wms_centros_poblados
},

"Capas WMS": {
"FGS": wms_FGS,
"Amenaza por FRM":wms_FRM_amz
}
};


var layerControl=L.control.groupedLayers(basemaps, groupedOverlays);
layerControl.addTo(mymap);

//LEYENDA WMS   http://localhost:8082/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=proyecto_final:amz_mm"

uri = "http://localhost:8082/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=proyecto_final:proyecto_final_mapa";
L.wmsLegend(uri);

	


//-----------------------------------------------------------------------------------------------------

//MEDIDOR EN MAPA

var measureControl = new L.Control.Measure({ 

            position: 'topleft',
            primaryLengthUnit: 'meters',
            secondaryLengthUnit: 'kilometers',
            primaryAreaUnit: 'sqmeters',
            secondaryAreaUnit: 'hectares'
        });


L.control.mousePosition().addTo(mymap);
        
measureControl.addTo(mymap);
        
        
        //LOCALIZACION GPS

lc = L.control.locate({
    strings: {
        title: "Llevame a mi ubicacion!"
	},
	locateOptions: {maxZoom: 19}}).addTo(mymap);


	// CREDITOS 
	L.control.condensedAttribution({
    emblem: '<div class="emblem-wrap"><img src="https://tierrabaja.files.wordpress.com/2017/03/univalle-logo-01.png?w=901"/></div>',
    prefix: '<a href="https://www.univalle.edu.co/" title="Pagina Univalle">Univalle;</a> | <a href="http://leafletjs.com" title="A JS library for interactive maps">Leaflet</a>'
    }).addTo(mymap);

    L.tileLayer('https://a.tiles.mapbox.com/v3/mi.0ad4304c/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> Creador: Aaron Artunduaga, ' +
    '<a href="https://www.linkedin.com/in/aaron-artunduaga-048597186">Contacto en Linkedin</a> ',
    }).addTo(mymap);

//----------------------------------------------------------------------------------------------------------------


//REGISTRO DESDE CLICK EN EL MAPA

var popup = L.popup();

	function onMapClick(e) {
		//Clase 10 - Comentar evento click y retorno de coordenadas
		popup
		.setLatLng(e.latlng)
		.setContent("Click en las coordenadas:  " + e.latlng.toString())
		.openOn(mymap);

		//Si doy click sobre el mapa, estando en true la variable bandera
		if(flag_registrar)
		{
			//caso para lanzar ventana modal una vez de click sobre el mapa
			lanzarVentanaRegistro(e);
		}
	}

    //Evento Click
	mymap.on('click', onMapClick);

	//Para que el cursor retorne estado por defecto en el mapa
	mymap.on('mousedown', function (e) { document.getElementById('mapid').style.cursor = ''; });


	L.easyButton('<img src="/Proyecto_final/images/home_button.png" width="20px">', function(btn, map)
	{
		//Lleva a vista original	
		mymap.flyTo([3.40720, -76.56866], 11);
	},'Vista por defecto').addTo( mymap );


    //Boton para que salga cursor para registrar
	var flag_registrar=false;
	L.easyButton('<img src="/Proyecto_final/images/landslide.png" width="30px">', function(btn, map)

	{
		document.getElementById('mapid').style.cursor = 'crosshair';
		flag_registrar=true;
		mymap.flyTo([3.40720, -76.56866], 12);

       
	},'Registrar FRM' ).addTo( mymap );



	//RECUPERA PUNTOS DESDE BASE DE DATOS

	L.easyButton('<img src="/Proyecto_final/images/icono2.png" width="20px">', function(btn, map)
	{
		//Recupero los sitios de interes desde la base de datos		
		cargarSitiosInteres();
		
		mymap.flyTo([3.40720, -76.56866], 12);
	},'Muestra registros FRM').addTo( mymap );

  //Semana 12  --  Boton Para Mapa de Cluster
  L.easyButton('<img src="/Proyecto_final/images/punto_final.png" width="20px">', function(btn, map)
	{
		cargarCluster();
	}).addTo( mymap );




   

//----------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------

//FUNCIONES 

//1)funcion para enviar reporte a BD desde formulario

//Evento click para boton boton-envio-reporte
$("#boton-envio-reporte").click(function() 
{
console.log('Enviar formulario y cerrar ventana modal');
//capturar los datos del formulario

var cx_ = $('#cx_form').val();
var cy_ = $('#cy_form').val();
var tipo_movimiento_ = $('#movimiento_form').val();
var tipo_material_ = $('#material_form').val();
var causa_ = $('#causa_form').val();
var afectados_ = $('#afectados_form').val();
var observaciones_ = $('#observaciones_form').val();

//Hago la peticion registro-desde-ventana-modal mediante el metodo post a funciones.php		
$.post("/Proyecto_final/src/funciones.php",
	{
		peticion: 'registro-desde-ventana-modal', 
		parametros: {  x:cx_ ,  y:cy_ ,  mov:tipo_movimiento_ , material:tipo_material_ , causa:causa_ , afectados:afectados_ , observaciones:observaciones_ }
		
	},
	function(data, status){
		console.log("Datos recibidos: " + data + "\nStatus: " + status);
		if(status=='success')
		{
			if(data=='NUEVO_REPORTE_CREADO')
			{
			   $('#div_mensaje_ventana_reporte').html('<h2>Reporte Almacenado con exito !!</h2>');
			   alert('Registro exitoso');
			}else
			{
				$('#div_mensaje_ventana_reporte').html('<h2>No se pudo almacenar el reporte!</h2>');
				alert('Registro fallido')	;
			}	
		}
	});	
//Para cerrar la ventana modal	
$.modal.close();
});


//Funcion para registro de datos
function lanzarVentanaRegistro(e)
	{
		// Capturo las coordenadas clickeadas sobre el mapa
		coordenada_y = e.latlng.lat.toString();
		coordenada_x = e.latlng.lng.toString();
		// Envio las coordenadas a los campos dentro del form
		$('#cx_form').val(coordenada_x);
		$('#cy_form').val(coordenada_y);

		//Limpio los campos del formulario
		$('#movimiento_form').val("");
		$('#material_form').val("");
		$('#causa_form').val("");
		$('#afectados_form').val("");
		$('#observaciones_form').val("");
		$('#div_mensaje_ventana_reporte').html("");

		// lanzo ventana modal para registrar datos de reporte
		$('#ventana-reporte').modal(
			{
				closeExisting: false,
				escapeClose: false,
  				clickClose: false,
			});
	}

//---------------------------------------------------------------------------------------------------------
//TRAER PUNTOS DESDE BD

	//Estilo para cada reporte

	function onEachFeatureSitiosInteres(feature, layer) 
	{
		//Asigno estilo a cada edificio		
		console.log(feature.properties.tipo_mov);
		if (feature.properties && feature.properties.tipo_mov) 
		{
			var mensaje = '<b>ID: </b> '+feature.properties.id;
			mensaje +='<br><b>Tipo movimiento: </b>' + feature.properties.tipo_mov;
			mensaje +='<br><b>Material: </b>' + feature.properties.material;
			mensaje +='<br><b>Fecha: </b>' + feature.properties.fecha_registro;

			layer.bindPopup(mensaje);
		}
	}


//TRAER PUNTOS DE MM DESDE LA BD

	//Solucion tarea -- Sitios de Interes
	var capaGeojsonSitiosInteres = L.geoJson();
	function cargarSitiosInteres()
	{
		//Hago la peticion recupera-sitios-interes-geojson mediante el metodo post a funciones.php		
		$.post("/Proyecto_final/src/funciones.php",
			{
				peticion: 'recupera-sitios-interes-geojson'
			},
			function(data, status){
				console.log("Datos recibidos: " + data + "\nStatus: " + status);
				if(status=='success')
				{
					//console.log(data);
					mymap.removeLayer(capaGeojsonSitiosInteres); 
					geojsonFeatureSitiosInteres= eval('('+data+')');
					
					//Agrego la capa de puntos
					capaGeojsonSitiosInteres = L.geoJson(geojsonFeatureSitiosInteres, 
					{
						pointToLayer: function (feature, latlng) 
						{
							//Icons from https://mapicons.mapsmarker.com/
							var smallIcon = L.icon(
							{
							iconSize: [27, 27],
							iconAnchor: [13, 27],
							popupAnchor:  [1, -24],
							iconUrl: '/Proyecto_final/images/mm_'+feature.properties.tipo_mov+'.png' 
						});
						
						    return L.marker(latlng, {icon: smallIcon}); 
						    },onEachFeature: onEachFeatureSitiosInteres 
						
					} ).addTo(mymap);

				}
			});	
	}

// CLUSTER

    function onEachFeatureStyledIcon(feature, layer) 
	{
		if (feature.properties) 
		{	
		    var mensaje="Loc: <b>"+feature.properties.localizacion+"</b><br>";		
		    layer.bindPopup(''+mensaje+'');
		}
	}
	

	var capaGeojson4 = L.geoJson();
	function cargarCluster()
	{
		$.post("/Proyecto_final/src/funciones.php",
			{
				peticion: 'recupera-geojson-cluster'
			},
			function(data, status){
				console.log("Datos recibidos: " + data + "\nStatus: " + status);
				if(status=='success')
				{
					//console.log(data);
					mymap.removeLayer(capaGeojson4); 
					geojsonFeature= eval('('+data+')');
					
					var markers = L.markerClusterGroup();
					
					capaGeojson4 = L.geoJson(geojsonFeature, 
					{
						pointToLayer: function (feature, latlng) 
						{
							//convierto en un string							
							var smallIcon = L.icon(
							{
							  iconSize: [27, 27],
							  iconAnchor: [13, 27],
							  popupAnchor:  [1, -24],
							  iconUrl: '/Proyecto_final/images/icono_'+feature.properties.opcion_registrada+'.png' 
						        });
						
							return L.marker(latlng, {icon: smallIcon}); 
						},onEachFeature: onEachFeatureStyledIcon 
						
					} );

					markers.addLayer(capaGeojson4);		
					mymap.addLayer(markers);					
				}
			});
	}       
        
        
        
        
        
        
        
        
        
        
        
        </script>

              



        </div>

    </main>

	<footer class="footer">
        <div class="contanier">
            <p>Curso Geoinformación en la Web </p>
            <span class="fb"><a class="menu-link" href="https://www.linkedin.com/in/aaron-artunduaga-048597186"><i class="fa fa-linkedin-square"></i></a> Aaron Artunduaga</span>
        </div>
    </footer>
    <!-- <script src="../js/jquery-3.5.0.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="lib/jquery/jquery-3.4.1.js"></script> -->
</body>

</html>
		  <!-- ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo  -->
   
   <?php
		  
	  }else{

		// CASO USUARIO NORMAL
	?>	  
		  <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Proyecto_final/css/estilo1.css">
    <script src="https://kit.fontawesome.com/0458944bda.js" crossorigin="anonymous"></script>
	
	<title>proyecto_final </title>
	<link rel="stylesheet" href="/Proyecto_final/lib/leaflet/leaflet.css" />
	<script src="/Proyecto_final/lib/leaflet/leaflet.js"></script>
	
	<link rel="stylesheet" href="/Proyecto_final/lib/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.min.css" />
	<script src="/Proyecto_final/lib/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.min.js"></script>
	
	<link rel="stylesheet" href="/Proyecto_final/lib/leaflet-easybutton/easy-button.css" />
    <script src="/Proyecto_final/lib/leaflet-easybutton/easy-button.js"></script>

     <!-- MEDIR -->
     <link rel="stylesheet" href="/Proyecto_final/lib/leaflet.measure-master/leaflet.measure.css"/>
     <script src="/Proyecto_final/lib/leaflet.measure-master/leaflet.measure.js"></script>
     <style>
       * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
       }
 
       html, body, #elMap {
         width: 100%;
         height: 100%;
       }
     </style>
     
    <!-- importar libreria JQuery -->
	<script src="/Proyecto_final/lib/jquery/jquery-3.4.1.js"></script>
	 
	 <!-- coordenadas en mapa-->
	<link rel="stylesheet" href="/Proyecto_final/lib/Leaflet.MousePosition-master/src/L.Control.MousePosition.css"/>
     <script src="/Proyecto_final/lib/Leaflet.MousePosition-master/src/L.Control.MousePosition.js"></script>


	<!-- localizacion-->

	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/Proyecto_final/lib/dist/L.Control.Locate.min.css">
	<script src="/Proyecto_final/lib/dist/L.Control.Locate.min.js"></script>


	<!-- leyenda WMS-->
	<link rel="stylesheet" href="/Proyecto_final/lib/leaflet-wms-legend-master/leaflet.wmslegend.css"/>
	<script src="/Proyecto_final/lib/leaflet-wms-legend-master/leaflet.wmslegend_mymap.js"></script>
	

	  <!-- leaflet-control-condensed -->
	<link rel="stylesheet" href="/Proyecto_final/lib/Leaflet.CondensedAttribution-master/dist/leaflet-control-condended-attribution.css" />
	<script type="text/javascript" src="/Proyecto_final/lib/Leaflet.CondensedAttribution-master/dist/leaflet-control-condended-attribution.js"></script>


  <!-- cluster -->
  <link rel="stylesheet" href="/Proyecto_final/lib/leaflet-markercluster/MarkerCluster.css" />
  <link rel="stylesheet" href="/Proyecto_final/lib/leaflet-markercluster/MarkerCluster.Default.css" />
  <script src="/Proyecto_final/lib/leaflet-markercluster/leaflet.markercluster.js"></script>



	<!-- Importtar la libreria  jQuery Modal -->
	<!-- Se esta usando un CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


    <!--  CSS -->
	<style>
		table, th, td {
  			border: 1px solid black;
		}
	</style>
   

      <!-- the demo-specific code -->
  <style type="text/css">
    body { padding: 0; margin: 0; }
    html, body, #map { height: 100%; }
    .leaflet-container .leaflet-control-attribution {
      border-radius: 26px;
    }
    .leaflet-control-attribution .attributes-body {
      height: 36px;
      line-height: 36px;
    }
    .leaflet-control-attribution .attributes-emblem {
      height: 36px;
      width: 36px;
    }
    .emblem-wrap, .emblem-wrap img {
      height: 20px;
    }
  </style>

    
    
</head>

<body>

    <!-- FORMULARIO HTML PARA INGRESAR DATOS A LA BD -->
	<div id="ventana-reporte" class="modal">
		<p>Reportar por coordenadas</p>
		<form>
			<label for="cx_form">Coordenada X:</label><br>
			<input type="text" id="cx_form" name="cx_form"><br>
			<label for="cy_form">Coordenada Y:</label><br>
			<input type="text" id="cy_form" name="cy_form"><br>
			
			<label for="movimiento_form">Tipo de movimiento:</label><br>
			<select id="movimiento_form" name="movimiento_form">
			<option value="Caida">Caida </option>
			<option value="Volcamiento">Volcamiento </option>
			<option value="Deslizamiento rotacional">Deslizamiento rotacional </option>
			<option value="Deslizamiento translacional">Deslizamiento translacional </option>
			<option value="Flujo">Flujo</option>
			<option value="Complejo">Complejo</option>
			</select>
			<br>

			<label for="material_form">Materiales:</label><br>
			<select id="material_form" name="material_form">
			<option value="Roca">Roca </option>
			<option value="Escombros">Escombros</option>
			<option value="Tierra">Tierra</option>
			</select>
			<br>
			
			<label for="causa_form">Causa:</label><br>
			<select id="causa_form" name="causa_form">
			<option value="Lluvias">Lluvias </option>
			<option value="Erosion">Erosion</option>
			<option value="Corte talud">Corte talud</option>
			<option value="Sismo">Sismo</option>
			<option value="Desconocido">Desconocido</option>
			</select>
			<br>

			<label for="afectados_form">Afectados:</label><br>
			<select id = "afectados_form" name="afectados">
			   <option value = "1"> Afectados </option>
			   <option value = "0"> Sin afectados </option>
			</select>
			<br>
	
			<label for="observaciones_form">Observaciones:</label><br>
			<input type="text" id="observaciones_form" name="observaciones_form"><br>

			<br>
			<input type="button" id="boton-envio-reporte" value="Enviar Reporte">
		  </form>
		  <div id="div_mensaje_ventana_reporte"></div>
	</div>

    <header class="header">
        <div class="container logo-nav-container">
            <a href="https://www.univalle.edu.co/" class="logo"><img src="https://tierrabaja.files.wordpress.com/2017/03/univalle-logo-01.png?w=901" width="80"
     height="90"></a>
            <span class="menu-icon">Ver menú</span>
        
            <nav class="navigation">
                <ul class="show">

				    
					
                   <!-- <li><a href="/Proyecto_final/src/index.php">Login</a></li>-->
                    <li><a href="/Proyecto_final/src/graficas.php">Graficas</a></li>
                    <li><a href="#ventana-reporte" rel="modal:open">Registrar </a></li>
					<li><a href="/Proyecto_final/src/form_read.php">Ver </a></li>
					<li><a href="index.php?op=salir">Salir</a></li>
					<li> <?php echo $_SESSION["usuario"]?></li>
 
                     <!-- Link para abir la ventana modal $_SESSION["iduser"]-->
                    

                    
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <h1>GEOVISOR FRM</h1>
        
        <!-- ESPACIO PARA MAPA    /position: absolute; width: 100%; height: 80%;;-->
        <div id="mapid" style="width: 100%; height: 600px; z-index:0;"></div>
        <div id="mensaje_que_cambia"></div>

  	

  <hr>      
<script>       
        
        var basemaps = 
{
    Streets: L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', 
{
	maxZoom: 19,
	attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}),

Opentopo: L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', 
{
	maxZoom: 18,
	attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
})


};


var wms_comunas = L.tileLayer.wms('http://idesc.cali.gov.co:8081/geoserver/wms?service=WMS&version=1.1.0', 
{
layers: 'idesc:mc_comunas',
attribution: 'Creditos de la capa',
format: 'image/png',
transparent: true
});

var wms_corregimientos = L.tileLayer.wms('http://idesc.cali.gov.co:8081/geoserver/wms?service=WMS&version=1.1.0', 
{
layers: 'idesc:mc_corregimientos',
attribution: 'Creditos de la capa',
format: 'image/png',
transparent: true
});

var wms_centros_poblados = L.tileLayer.wms('http://idesc.cali.gov.co:8081/geoserver/wms?service=WMS&version=1.1.0', 
{
layers: 'pot_2014:bcs_centros_poblados',
attribution: 'Creditos de la capa',
format: 'image/png',
transparent: true
});

var wms_FGS = L.tileLayer.wms('http://localhost:8082/geoserver/wms?service=WMS', 
{
layers: 'proyecto_final:fgs',
attribution: 'Creditos de la capa',
format: 'image/png',
transparent: true

});

var wms_FRM_amz = L.tileLayer.wms('http://localhost:8082/geoserver/wms?service=WMS', 
{
layers: 'proyecto_final:amz_mm',
attribution: 'Creditos de la capa',
format: 'image/png',
transparent: true
});

var mymap = L.map('mapid',
{
zoom: 10
}).setView([3.42335,-76.52086], 13);



basemaps.Streets.addTo(mymap);

wms_comunas.addTo(mymap);
wms_corregimientos.addTo(mymap);
wms_centros_poblados.addTo(mymap);
wms_FGS.addTo(mymap);
wms_FRM_amz.addTo(mymap);



var groupedOverlays = {
"Carto base": {
"Comunas": wms_comunas,
"Corregimientos": wms_corregimientos,
"Centros Poblados": wms_centros_poblados
},

"Capas WMS": {
"FGS": wms_FGS,
"Amenaza por FRM":wms_FRM_amz
}
};


var layerControl=L.control.groupedLayers(basemaps, groupedOverlays);
layerControl.addTo(mymap);

//LEYENDA WMS   http://localhost:8082/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=proyecto_final:amz_mm"

uri = "http://localhost:8082/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=proyecto_final:proyecto_final_mapa";
L.wmsLegend(uri);

	


//-----------------------------------------------------------------------------------------------------

//MEDIDOR EN MAPA

var measureControl = new L.Control.Measure({ 

            position: 'topleft',
            primaryLengthUnit: 'meters',
            secondaryLengthUnit: 'kilometers',
            primaryAreaUnit: 'sqmeters',
            secondaryAreaUnit: 'hectares'
        });


L.control.mousePosition().addTo(mymap);
        
measureControl.addTo(mymap);
        
        
        //LOCALIZACION GPS

lc = L.control.locate({
    strings: {
        title: "Llevame a mi ubicacion!"
	},
	locateOptions: {maxZoom: 19}}).addTo(mymap);


	// CREDITOS 
	L.control.condensedAttribution({
    emblem: '<div class="emblem-wrap"><img src="https://tierrabaja.files.wordpress.com/2017/03/univalle-logo-01.png?w=901"/></div>',
    prefix: '<a href="https://www.univalle.edu.co/" title="Pagina Univalle">Univalle;</a> | <a href="http://leafletjs.com" title="A JS library for interactive maps">Leaflet</a>'
    }).addTo(mymap);

    L.tileLayer('https://a.tiles.mapbox.com/v3/mi.0ad4304c/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> Creador: Aaron Artunduaga, ' +
    '<a href="https://www.linkedin.com/in/aaron-artunduaga-048597186">Contacto en Linkedin</a> ',
    }).addTo(mymap);

//----------------------------------------------------------------------------------------------------------------


//REGISTRO DESDE CLICK EN EL MAPA

var popup = L.popup();

	function onMapClick(e) {
		//Clase 10 - Comentar evento click y retorno de coordenadas
		popup
		.setLatLng(e.latlng)
		.setContent("Click en las coordenadas:  " + e.latlng.toString())
		.openOn(mymap);

		//Si doy click sobre el mapa, estando en true la variable bandera
		if(flag_registrar)
		{
			//caso para lanzar ventana modal una vez de click sobre el mapa
			lanzarVentanaRegistro(e);
		}
	}

    //Evento Click
	mymap.on('click', onMapClick);

	//Para que el cursor retorne estado por defecto en el mapa
	mymap.on('mousedown', function (e) { document.getElementById('mapid').style.cursor = ''; });


	L.easyButton('<img src="/Proyecto_final/images/home_button.png" width="20px">', function(btn, map)
	{
		//Lleva a vista original	
		mymap.flyTo([3.40720, -76.56866], 11);
	},'Vista por defecto').addTo( mymap );


    //Boton para que salga cursor para registrar
	var flag_registrar=false;
	L.easyButton('<img src="/Proyecto_final/images/landslide.png" width="30px">', function(btn, map)

	{
		document.getElementById('mapid').style.cursor = 'crosshair';
		flag_registrar=true;
		mymap.flyTo([3.40720, -76.56866], 12);

       
	},'Registrar FRM' ).addTo( mymap );



	//RECUPERA PUNTOS DESDE BASE DE DATOS

	L.easyButton('<img src="/Proyecto_final/images/icono2.png" width="20px">', function(btn, map)
	{
		//Recupero los sitios de interes desde la base de datos		
		cargarSitiosInteres();
		
		mymap.flyTo([3.40720, -76.56866], 12);
	},'Muestra registros FRM').addTo( mymap );

  //Semana 12  --  Boton Para Mapa de Cluster
  L.easyButton('<img src="/Proyecto_final/images/punto_final.png" width="20px">', function(btn, map)
	{
		cargarCluster();
	}).addTo( mymap );




   

//----------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------

//FUNCIONES 

//1)funcion para enviar reporte a BD desde formulario

//Evento click para boton boton-envio-reporte
$("#boton-envio-reporte").click(function() 
{
console.log('Enviar formulario y cerrar ventana modal');
//capturar los datos del formulario

var cx_ = $('#cx_form').val();
var cy_ = $('#cy_form').val();
var tipo_movimiento_ = $('#movimiento_form').val();
var tipo_material_ = $('#material_form').val();
var causa_ = $('#causa_form').val();
var afectados_ = $('#afectados_form').val();
var observaciones_ = $('#observaciones_form').val();

//Hago la peticion registro-desde-ventana-modal mediante el metodo post a funciones.php		
$.post("/Proyecto_final/src/funciones.php",
	{
		peticion: 'registro-desde-ventana-modal', 
		parametros: {  x:cx_ ,  y:cy_ ,  mov:tipo_movimiento_ , material:tipo_material_ , causa:causa_ , afectados:afectados_ , observaciones:observaciones_ }
		
	},
	function(data, status){
		console.log("Datos recibidos: " + data + "\nStatus: " + status);
		if(status=='success')
		{
			if(data=='NUEVO_REPORTE_CREADO')
			{
			   $('#div_mensaje_ventana_reporte').html('<h2>Reporte Almacenado con exito !!</h2>');
			   alert('Registro exitoso');
			}else
			{
				$('#div_mensaje_ventana_reporte').html('<h2>No se pudo almacenar el reporte!</h2>');
				alert('Registro fallido')	;
			}	
		}
	});	
//Para cerrar la ventana modal	
$.modal.close();
});


//Funcion para registro de datos
function lanzarVentanaRegistro(e)
	{
		// Capturo las coordenadas clickeadas sobre el mapa
		coordenada_y = e.latlng.lat.toString();
		coordenada_x = e.latlng.lng.toString();
		// Envio las coordenadas a los campos dentro del form
		$('#cx_form').val(coordenada_x);
		$('#cy_form').val(coordenada_y);

		//Limpio los campos del formulario
		$('#movimiento_form').val("");
		$('#material_form').val("");
		$('#causa_form').val("");
		$('#afectados_form').val("");
		$('#observaciones_form').val("");
		$('#div_mensaje_ventana_reporte').html("");

		// lanzo ventana modal para registrar datos de reporte
		$('#ventana-reporte').modal(
			{
				closeExisting: false,
				escapeClose: false,
  				clickClose: false,
			});
	}

//---------------------------------------------------------------------------------------------------------
//TRAER PUNTOS DESDE BD

	//Estilo para cada reporte

	function onEachFeatureSitiosInteres(feature, layer) 
	{
		//Asigno estilo a cada edificio		
		console.log(feature.properties.tipo_mov);
		if (feature.properties && feature.properties.tipo_mov) 
		{
			var mensaje = '<b>ID: </b> '+feature.properties.id;
			mensaje +='<br><b>Tipo movimiento: </b>' + feature.properties.tipo_mov;
			mensaje +='<br><b>Material: </b>' + feature.properties.material;
			mensaje +='<br><b>Fecha: </b>' + feature.properties.fecha_registro;

			layer.bindPopup(mensaje);
		}
	}


//TRAER PUNTOS DE MM DESDE LA BD

	//Solucion tarea -- Sitios de Interes
	var capaGeojsonSitiosInteres = L.geoJson();
	function cargarSitiosInteres()
	{
		//Hago la peticion recupera-sitios-interes-geojson mediante el metodo post a funciones.php		
		$.post("/Proyecto_final/src/funciones.php",
			{
				peticion: 'recupera-sitios-interes-geojson'
			},
			function(data, status){
				console.log("Datos recibidos: " + data + "\nStatus: " + status);
				if(status=='success')
				{
					//console.log(data);
					mymap.removeLayer(capaGeojsonSitiosInteres); 
					geojsonFeatureSitiosInteres= eval('('+data+')');
					
					//Agrego la capa de puntos
					capaGeojsonSitiosInteres = L.geoJson(geojsonFeatureSitiosInteres, 
					{
						pointToLayer: function (feature, latlng) 
						{
							//Icons from https://mapicons.mapsmarker.com/
							var smallIcon = L.icon(
							{
							iconSize: [27, 27],
							iconAnchor: [13, 27],
							popupAnchor:  [1, -24],
							iconUrl: '/Proyecto_final/images/mm_'+feature.properties.tipo_mov+'.png' 
						});
						
						    return L.marker(latlng, {icon: smallIcon}); 
						    },onEachFeature: onEachFeatureSitiosInteres 
						
					} ).addTo(mymap);

				}
			});	
	}

// CLUSTER

    function onEachFeatureStyledIcon(feature, layer) 
	{
		if (feature.properties) 
		{	
		    var mensaje="Barrio: <b>"+feature.properties.localizacion+"</b><br>";		
		    layer.bindPopup(''+mensaje+'');
		}
	}
	

	var capaGeojson4 = L.geoJson();
	function cargarCluster()
	{
		$.post("/Proyecto_final/src/funciones.php",
			{
				peticion: 'recupera-geojson-cluster'
			},
			function(data, status){
				console.log("Datos recibidos: " + data + "\nStatus: " + status);
				if(status=='success')
				{
					//console.log(data);
					mymap.removeLayer(capaGeojson4); 
					geojsonFeature= eval('('+data+')');
					
					var markers = L.markerClusterGroup();
					
					capaGeojson4 = L.geoJson(geojsonFeature, 
					{
						pointToLayer: function (feature, latlng) 
						{
							//convierto en un string							
							var smallIcon = L.icon(
							{
							  iconSize: [27, 27],
							  iconAnchor: [13, 27],
							  popupAnchor:  [1, -24],
							  iconUrl: 'images/icono_'+feature.properties.opcion_registrada+'.png' 
						        });
						
							return L.marker(latlng, {icon: smallIcon}); 
						},onEachFeature: onEachFeatureStyledIcon 
						
					} );

					markers.addLayer(capaGeojson4);		
					mymap.addLayer(markers);					
				}
			});
	}       
        
        
        
        
        
        
        
        
        
        
        
        </script>

              



        </div>

    </main>

    <footer class="footer">
        <div class="contanier">
            <p>Curso Geoinformación en la Web </p>
            <span class="fb"><a class="menu-link" href="https://www.linkedin.com/in/aaron-artunduaga-048597186"><i class="fa fa-linkedin-square"></i></a> Aaron Artunduaga</span>
        </div>
    </footer>
    <!-- <script src="../js/jquery-3.5.0.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="lib/jquery/jquery-3.4.1.js"></script> -->
</body>

</html>
      



	 <?php 
	 }
	?>

	


</body>
</html>

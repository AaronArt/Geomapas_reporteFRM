<?php 

  //configuracion de la conexion a la base de datos

  include('configuracion.php');
   
  session_start();
  
  if(!isset($_POST['peticion']))
  {
   $_POST['peticion'] = "peticion";
  }

  if(!isset($_POST['parametros']))
  {
   $_POST['parametros'] = "parametros";
  }

  $peticion = $_POST['peticion'];
  $parametros = $_POST['parametros'];

    switch($peticion)
   {

		//CASO PARA REGISTRAR UN REPORTE DESDE UNA VENTANA MODAL
		case 'registro-desde-ventana-modal':
		{   
			$px = $parametros['x'];
			$py = $parametros['y'];
			$pmov = $parametros['mov'];
			$pmaterial = $parametros['material'];
			$pcausa = $parametros['causa'];
			$pafectados = $parametros['afectados'];
			$pobservaciones = $parametros['observaciones'];


			$sql = "INSERT INTO inventario(x,y,tipo_mov,material,causa,fecha_registro,afectados,observaciones)VALUES($px,$py,'$pmov','$pmaterial','$pcausa', now(), '$pafectados','$pobservaciones')";

			$query = pg_query($dbcon,$sql);

			if($query)
			{
				//si se ejecuto la consulta con exito retorno un identificador
				echo "NUEVO_REPORTE_CREADO";
			}else
			{
				//si NO se ejecuto la consulta retorno un identificador
				echo "NOSEPUDOCREARELREPORTE";
			}

		    break;
		}


		case 'recupera-sitios-interes-geojson':
			{
				$sql="SELECT row_to_json(fc)
				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features
				FROM (SELECT 'Feature' As type
				, ST_AsGeoJSON(lg.the_geom)::json As geometry
				, row_to_json((SELECT l FROM (SELECT id,tipo_mov, material, fecha_registro) As l
				)) As properties
				FROM (select st_geometryfromtext('POINT(' || a.x::TEXT || ' ' || a.y::TEXT || ')')as the_geom, id, tipo_mov,material,fecha_registro FROM inventario a ) As lg  
				where ST_IsValid(lg.the_geom) ) As f )  As fc;";
	   
				$query = pg_query($dbcon,$sql);
				$row = pg_fetch_row($query);
				echo $row[0];
				break;
			}
		
			case 'validar-login':
				{
						$login = $parametros['login'];
						$password = $parametros['password'];
						
						$sql="select usuario,contrasena,id_rol,id_usuario from usuarios where usuario='$login'  and contrasena = md5('$password');";
						$query = pg_query($dbcon,$sql);
						// si se obtiene mas de un registro en el select
						$row=pg_fetch_row($query);
						if($row>1)
						{
							echo "ENTRAR";
							$_SESSION["rol"] = $row[2];
							$_SESSION["iduser"] = $row[3];
							$_SESSION["usuario"] = $row[0];
							
						}else
						{
							echo "NOVALIDO";
						}
						break;
				}
				
				    		//CASO Semana12 Clase - Cluster
		    case 'recupera-geojson-cluster':
			   {
				$sql3="SELECT row_to_json(fc)
				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features
				FROM (SELECT 'Feature' As type
				, ST_AsGeoJSON(lg.the_geom)::json As geometry
				, row_to_json((SELECT l FROM (SELECT localizacion) As l
				)) As properties
				FROM (SELECT st_geometryfromtext('POINT(' || a.x::TEXT || ' ' || a.y::TEXT || ')')as the_geom, localizacion FROM inventario a ) As lg  
				where ST_IsValid(lg.the_geom) ) As f )  As fc;";
	   
				$query3 = pg_query($dbcon,$sql3);
				$row = pg_fetch_row($query3);
				echo $row[0];
				break;
			   }
	


   }
    

?>

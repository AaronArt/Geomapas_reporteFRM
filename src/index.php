<?php
	session_start();
	  
	if(isset($_GET['op']))
	{
		if($_GET['op']=='salir')
		{
			if(isset($_SESSION["rol"])){ session_unset(); session_destroy(); }
		}else
		{
			  if(isset($_SESSION["rol"])){ header('Location: pagina_protegida.php?logueado=si');  }
		}
	}
		
	 
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/Proyecto_final/css/login_style.css">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="/Proyecto_final/lib/jquery/jquery-3.4.1.js"></script>
        <script type="text/javascript">
	
	
	$( document ).ready(function() 
	{
        
		$("#boton1").click(function()
		{
			$.post("/Proyecto_final/src/funciones.php",
			{
				peticion: 'validar-login',
				parametros: {  login: $("#caja_usuario").val() ,  password: $("#caja_password").val()  },
			},
			function(data, status){
				console.log("Datos recibidos: " + data + "\nStatus: " + status);
				if(status=='success')
				{
					if(data=='ENTRAR')
					{
						//Ingresa al archivo pagina_protegida.php
                        document.location.href ='pagina_protegida.php?logueado=si';	
					}else
					{
						
						$("#caja_respuesta").html( '<br><b>Usuario o contraseña incorrectos </b>' );

						//$("#caja_respuesta2").html( '<br><b> <a href="../src/form_create.php">Registro</a>  </b>' );
						
						
					}
				}
				
			});
		});
		
		
    });
	
	</script>
   </head>
<body>


<!--  esto es un comentario-->
<!--  formulario simple, usuario y password -->	

<title>Formulario Registro</title>
</head>
<body>

  <section class="form-register">

    <h4>Inicio de sesión</h4>
    <input class="controls" type="text" name="caja_usuario" id="caja_usuario" placeholder="Ingrese su usuario">
    <input class="controls" type="password" name="caja_password" id="caja_password" placeholder="Ingrese su contraseña">
  
	<button class="botons" id="boton1" >Ingresar al Sistema</button>
	<p> <a href="../src/form_create.php">Registro</a>  </p>

	<div align="center"  class= "caja"id="caja_respuesta"> </div> 
<br>
<br>
	<a href="/Proyecto_final/pagina_inicio.html"><H5>Volver al inicio</H5</a>
   
  </section>



<!-- Usuario: <input type="text" id="caja_usuario" value=""> </input><br>
Password: <input type="password" id="caja_password" value=""></input><br><br> 

<button id="boton1" >Ingresar al Sistema</button>

<br>
Digite usuario y password para ingresar-->



<!--<div  id="caja_respuesta2"> </div>-->
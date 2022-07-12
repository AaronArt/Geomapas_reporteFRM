<?php
 #Archivo de configuracion de la base de datos
 
        define("PG_DB"  , "d4jdnnep7hhvs5");
	define("PG_HOST", "ec2-3-223-169-166.compute-1.amazonaws.com");
	define("PG_USER", "hgtzrmzftbbktp");
	define("PG_PSWD", "a3ec407f9b46c96c9eef970b1845026c9ab160640340d01c07b092075771ce6b");
	define("PG_PORT", "5432");
	
	$dbcon = pg_connect("dbname=".PG_DB." host=".PG_HOST." user=".PG_USER ." password=".PG_PSWD." port=".PG_PORT."");

    try {
    $databasePDO = new PDO("pgsql:host=".PG_HOST.";port=".PG_PORT.";dbname=".PG_DB."", PG_USER, PG_PSWD);
    $databasePDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Ocurrio un error con la base de datos: " . $e->getMessage();
}


?>

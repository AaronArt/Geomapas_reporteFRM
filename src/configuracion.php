<?php
 #Archivo de configuracion de la base de datos
 
        define("PG_DB"  , "proyectofinal");
	define("PG_HOST", "localhost");
	define("PG_USER", "user");
	define("PG_PSWD", "user");
	define("PG_PORT", "5432");
	
	$dbcon = pg_connect("dbname=".PG_DB." host=".PG_HOST." user=".PG_USER ." password=".PG_PSWD." port=".PG_PORT."");

    try {
    $databasePDO = new PDO("pgsql:host=".PG_HOST.";port=".PG_PORT.";dbname=".PG_DB."", PG_USER, PG_PSWD);
    $databasePDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Ocurrio un error con la base de datos: " . $e->getMessage();
}


?>

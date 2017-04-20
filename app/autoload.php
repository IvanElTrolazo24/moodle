<?php
return
//$usuario = new App\Models\Usuario;
	spl_autoload_register(function($classname)
	{	
		//$classname = 'App\Models\Usuario'
		$ruta = strtolower($classname);
		//$classname = 'app\models\usuario'
		$ruta = str_replace("\\", "/", $ruta) . ".php";
		//$classname = 'app/models/usuario'
		if (is_readable($ruta)) 
			require $ruta;
	
		else
		
			die("El archivo $ruta no existe.");
		
		
	});
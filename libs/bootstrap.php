<?php

class Bootstrap
{

	function __construct()
	{

			$url = $_SERVER['REQUEST_URI'];
			$url = str_replace(str_replace("/", "", URL), "", $url);
			$url = rtrim($url, "/");
      $url = ltrim($url, "/");
			$url = explode("/", $url);

			if( empty($url[0]) ){

      	require "controllers/home_controller.php";
				new home_controller();


				return false;

			}


			$file = "controllers/".$url[0]."_controller.php";


		if(file_exists($file) )
		{

			require $file;
                        $cont = $url[0]."_controller";
                        $controller = new $cont();
			if( isset($url[2]) ){

				$controller->{ $url[1] }($url[2]);

			}else{

				if(isset($url[1]) ){

					 $controller->{ $url[1] }();

				}

			}


		}else{

			die("No such ontroller ".$file);
		}
	}
}

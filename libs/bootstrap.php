<?php

class Bootstrap
{

	function __construct()
	{

			$url = $_SERVER['REQUEST_URI'];

			//$url = ltrim($url, "/php/index/");
			$url = preg_replace('#^/php/index/#', '', $url);

			$url = rtrim($url, "/");


			$url = explode("/", $url);

			if( empty($url[0]) ){
				require "controllers/home_controller.php";
		
				require "views/Home.php";
				return false;
			}



			$file = "controllers/".$url[0]."_controller.php";

		if(file_exists($file) )
		{

			require $file;
      $url[0] = $url[0]."_controller";

      $controller = new $url[0];

			$controller->loadModel($url[0]);


			if( isset($url[2]) ){


				$controller->{ $url[1] }($url[2]);

			}else{

				if(isset($url[1]) ){

					 $controller->{ $url[1] }();

				}

			}


		}else{
      echo $file;
			die("No such ontroller ".$file);
		}
	}
}

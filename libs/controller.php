<?php


	class Controller
	{

		public $view;

		function __construct()
		{

			$this->view = new View();

		}

		public function loadModel($name){

			$path = "models/".$name."_model.php";
			if(file_exists($path)){


			require $path;

			$name = $name;

			$name = preg_replace('#_model.php$/#', '', $name);

			$this->model = new $name;
		}

		}

	}

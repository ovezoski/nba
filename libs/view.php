<?php 


class View
{
	
	function __construct()
	{
		# code...
	}

	public function render($template){
		require "views/".$template.".php";
	}
}
<?php


class Login_controller extends controller
{

  function __construct()
  {
    parent::__construct();
    $this->loadModel("login");
  }

  public function login(){
	if(isset($_POST['username'])){
		$this->model->login();
	}else{
		$this->view->render("login");

	}
}

  public function logout($value='')
  {
    login::logout();
    header("location: ".URL."/home/");

  }



}





 ?>

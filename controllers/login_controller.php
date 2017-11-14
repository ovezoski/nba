<?php

/**
 *
 */
class Login_controller extends controller
{

  function __construct()
  {
    # code...
    parent::__construct();
    $this->view->render("login");
  }

  function login(){

    $this->model->login();

  }

  public function logout($value='')
  {
    login_model::logout();
    header("location: ".URL."/home/");

  }

}





 ?>

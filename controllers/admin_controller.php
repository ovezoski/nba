<?php

/**
 *
 */
class admin_controller extends controller
{

  function __construct()
  {
      parent::__construct();
      $this->view->render("admin/admin");
  }


}



 ?>

<?php

/**
 *
 */
class admin_controller extends controller
{

  function __construct()
  {
      parent::__construct();
      if(session::auth()){
        $this->view->render("admin/admin");
      }
  }


}



 ?>

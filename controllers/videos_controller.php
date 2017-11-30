<?php

/**
 *
 */
class videos_controller extends controller
{

  function __construct()
  {
    parent::__construct();
    $this->loadModel("video");
  }

  public function delete()
  {
    if(session::auth()){

      $id= $_POST['id'];
      $this->model->delete($id);
    }
  }

  public function create($player_id)
  {
    $this->model->create($player_id);

  }

}


 ?>

<?php

/**
 *
 */
class teams_controller extends Controller
{

  function __construct()
  {
    parent::__construct();
    $this->loadModel("team");
  }



  public function create()
  {
    if(isset($_POST['team'])){

      if($this->model->create()){
          echo "Sucessfully created team with name: ".$_POST['team'];
      }else{
        echo "Name not available";
      }

    }else{
      $this->view->render("team");
    }

    }

  public function preview()
  {
    $this->model->getAll();
  }


  public function get($team_id = false)
    {
      $this->model->get($team_id);
    }

  public function edit($team = false)
  {
    # code...
    $edited = $this->model->edit($team);
    if($edited){
      $this->view->team = $edited;
      $this->view->render("edit-team");
    }

  }

}


 ?>

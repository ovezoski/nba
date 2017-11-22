<?php

class players_controller extends Controller
{

  function __construct()
  {
    parent::__construct();
    parent::loadModel("player");
  }

   public function create($team = false)#admin
  {

    session::auth();

    if(isset($_POST["firstname"])  ){
      if($team){


        $this->model->create($team);
        //header("location: ".URL."/teams/edit/".$team);

      }else{
        die("Please suply a valid team id");
      }
    }


  }

  public function edit($player_id = false) #admin
  {
    session::auth();
    $this->view->player_id = $player_id;


    if(isset($_POST['video'])){
      $this->model->addVideo($player_id);
    }

    if(isset($_POST['description'])){
      $this->model->addDescription($player_id);
    }
    if(isset($_POST['submit']) ){
      $this->model->update($player_id);
    }

    $this->view->render("admin/player");
  }

  public function delete($id = false) #admin
  {
    session::auth();
    $this->model->delete($id);
  }


  public function get($player_id= false)#user
  {
  $this->model->get($player_id);


  }

  public function preview($id) #user
  {
    $this->view->player_id= $id;
    $this->view->render("player-preview");
  }



  public function getVideos($id=false)#user
  {
    $this->model->getVideos($id);
  }

}



 ?>

<?php

class players_controller extends Controller
{

  function __construct()
  {
    parent::__construct();
    parent::loadModel("player");
  }

   public function submit($team = false)
  {


    if(isset($_POST["players"])  ){

      if($team){

        $this->model->create($team);
        header("location: ".URL."/teams/edit/".$team);

      }else{
        die("Please suply a valid team id");
      }
    }else{
        $this->view->render("players");
    }


  }

  public function get($player_id= false)
  {
    if($player_id){
      $this->model->get($player_id);
    }

  }

  public function edit($player_id = false)
  {
    $this->view->player_id = $player_id;

    if(isset($_POST['video'])){
      $this->model->addVideo($player_id);
    }

    if(isset($_POST['description'])){
        $this->view->description = $_POST['description'];
    }

    $this->view->render("edit-player");
  }

  public function getVideos($id=false)
  {
    $this->model->getVideos($id);
  }

  public function delete($id = false)
  {
    $this->model->delete($id);
  }


}



 ?>

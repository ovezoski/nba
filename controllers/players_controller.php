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

    if(session::auth()){


        if($team){


          $this->model->create($team);
          header("location: ".URL."/teams/edit/".$team);


      }
    }



  }

  public function edit($player_id = false) #admin
  {
          if(session::auth()){

            $this->view->player_id = $player_id;


            if(isset($_POST['video'])){
              $this->model->addVideo($player_id);
            }


            if(isset($_POST['submit']) ){
              $this->model->update($player_id);
            }

            $this->view->render("admin/player");

          }
        }

  public function delete() #admin
  {
    if(session::auth()){
      $this->model->delete($_POST['id']);
    }

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

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


    if(isset($_POST["players"])  ){
      if($team){


        $this->model->create($team);
        header("location: ".URL."/teams/edit/".$team);

      }else{
        die("Please suply a valid team id");
      }
    }else{
      echo" ens";
        $this->view->render("players");
    }


  }

  public function edit($player_id = false) #admin
  {
    $this->view->player_id = $player_id;


    if(isset($_POST['video'])){
      $this->model->addVideo($player_id);
    }

    if(isset($_POST['description'])){
      $this->model->addDescription($player_id);
    }

    $this->view->render("edit-player");
  }

  public function delete($id = false) #admin
  {
    $this->model->delete($id);
  }



  public function image()#admin
  {
    echo phpversion();
    move_uploaded_file($_FILES['file']['tmp_name'], realpath(dirname(__FILE__))."\..\uploads\\".basename($_FILES['file']['name']));
    print_r($_FILES);
    echo "<br/>";
    print_r($_POST);
  }

  public function addPhoto($id)#admin
  {
    print_r($_POST);
    $this->model->addPhoto($_POST['picture-src'], $id);
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

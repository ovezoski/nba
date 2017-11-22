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

#admin ????????????????????????

  public function create() #creates a new team
  {
    session::auth();
    if(isset($_POST['team'])){

      if($this->model->create()){
        header("location: ".URL."/admin ");
      }else{
        echo "Name not available";
      }

    }else{
      $this->view->render("team");
    }

  }

public function delete()
{
  session::auth();
  $this->model->delete($_POST['id']);
}

  public function edit($team = false) #renders the edit team with sending id to it
  {
    if(isset($_POST['edit'])){
      session::auth();
      $this->model->update($team);
      //echo $team;

    }else{

    $edited = $this->model->getId($team);

    if($edited){
      $this->view->team = $edited;
      $this->view->render("admin/team");
    }

  }

  }




#user ??????????????????????????????

public function view($id)
{
  # display team players
  $this->view->team = $id;
  $this->view->render("team-preview");
}


  public function get($team_id = false) #gets all players of a team
    {
    if(isset($_POST['jt']) ){
      $this->model->get($team_id, "text");
    }else{
      $this->model->get($team_id );
    }

    }

    public function preview() #returns json of all existing teams
    {
      $this->model->getAll();
    }

}
 ?>

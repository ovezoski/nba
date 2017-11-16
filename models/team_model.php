<?php

/**
 *
 */
class team extends model
{

  function __construct()
  {
    parent::__construct();

  }

  public function create()
  {
    $team_name = $_POST['team'];

    $find_team = $this->db->prepare("Select * from teams where name='".$team_name."' ");
    $find_team->execute();
    if($find_team->rowCount()){
      return false;
    }
    else{
      $create_team = $this->db->prepare("INSERT INTO teams (name, players) values ('".$team_name."', 0)");
      $create_team->execute();
      return true;
    }
  }

  public function getAll()
  {

    $get_teams = $this->db->prepare("Select * from teams");
    $get_teams->execute();
    echo json_encode($get_teams->fetchAll());
  }

  public function get($id = false)
  {
    if($id){
        $get_players = $this->db->prepare("SELECT * FROM players WHERE team_id = $id ");
        $get_players->execute();
        echo json_encode($get_players->fetchAll());


    }else{


    }
  }

  public function getId($team = false)
  {
    if($team){

      $find_team = $this->db->prepare("Select id from teams where id='".$team."' ");
      $find_team->execute();
      if($find_team->rowCount()){


        return $find_team->fetchAll();
      }else{
        echo "No such team";
        return false;
      }
    }else{
      echo "Please suply a valid team name";
      return false;
    }
  }

}


 ?>

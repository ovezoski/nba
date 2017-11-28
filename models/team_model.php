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
      $create_team = $this->db->prepare("INSERT INTO teams (name, logo) values ('".$team_name."', 'https://lh3.googleusercontent.com/axHDuTtBSZikp5rxWeDSotNLGRwxKRYJw--dDzi_hqoxO9_-CRKWTqkfZ-rhmdEEig=w300')");
      $create_team->execute();
      return true;
        print_r($create);
    }
  }
  public function delete($id)
  {
    $delete_team = $this->db->prepare("DELETE FROM teams WHERE id=:id ");
    $delete_team->execute( array(':id' => $id ));
    $delete_players = $this->db->prepare("DELETE FROM players WHERE team_id=:id ");
    $delete_players->execute( array(':id' => $id ));
  }
  public function update($id)
  {
    $set = "";
    foreach($_POST as $key=>$value){


      if($key != "edit"){
        if($set){
          $set=$set.", ";
        }
        $set= $set.$key." = '".$value."' ";
      }

    }

    $update_team = $this->db->prepare("UPDATE teams SET ".$set." WHERE id=".$id." ");
    $update_team->execute();

    header("location: ".URL."/teams/edit/".$id);
  }

  public function getAll()
  {

    $get_teams = $this->db->prepare("Select * from teams");
    $get_teams->execute();
    echo json_encode($get_teams->fetchAll());
  }

  public function get($id = false, $jt= false)
  {

    if($jt){
    $get_team = $this->db->prepare("SELECT * FROM teams WHERE id=:id ");
    $get_team->execute(array(':id' => $id ));
        echo json_encode($get_team->fetchAll());

    }else{

        $get_players = $this->db->prepare("SELECT * FROM players WHERE team_id = $id ");
        $get_players->execute();
        echo json_encode($get_players->fetchAll());

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
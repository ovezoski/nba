<?php

class player extends model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id){

    $players = $_POST["players"];

    foreach($players as $player){

      $query = $this->db->prepare("INSERT INTO players (name, team_id) VALUES ('".$player."', '".$id."')");
      $query->execute();


    }
  }

  public function get($player_id= false)
  {
    if($player_id){
        $get_player = $this->db->prepare("SELECT * FROM players WHERE id = '".$player_id."' ");
        $get_player->execute();
        echo json_encode($get_player->fetchAll());
    }
    else{
      $get_all = $this->db->prepare("SELECT * FROM players");
      $get_all->execute();
      echo json_encode($get_all->fetchAll());

    }

  }


  public function delete($id)
  {
    $delete = $this->db->prepare("DELETE FROM players WHERE id='".$id."' ");
    $delete->execute();
  }

  public function addDescription($id)
  {
    $add_description = $this->db->prepare("UPDATE players SET description='".$_POST["description"]."' WHERE id = ".$id." ");
    $add_description->execute();
  }

  public function addVideo($id)
  {
    $video = $_POST['video'];
    $add_video = $this->db->prepare("INSERT INTO videos (player_id, link) VALUES('".$id."', '".$video."')");
    $add_video->execute();
  }
  public function addPhoto($link, $id)
  {
    $add_link = $this->db->prepare("UPDATE players SET picture='".$link."' where id=".$id." ");
    print_r($add_link);
    $add_link->execute();
  }

  public function getVideos($id=false)
  {
    $get_videos = $this->db->prepare("SELECT * FROM videos WHERE player_id = '".$id."' ");
    $get_videos->execute();
    echo json_encode($get_videos->fetchAll());
  }

}

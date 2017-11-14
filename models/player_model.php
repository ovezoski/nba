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
      echo "all";
    }

  }


  public function delete($id)
  {
    $delete = $this->db->prepare("DELETE FROM players WHERE id='".$id."' ");
    $delete->execute();
  }

  public function addDesc($value='')
  {
    # code...
  }

  public function addVideo($id)
  {
    $video = $_POST['video'];
    $add_video = $this->db->prepare("INSERT INTO videos (player_id, link) VALUES('".$id."', '".$video."')");
    $add_video->execute();
  }
  public function getVideos($id=false)
  {
    $get_videos = $this->db->prepare("SELECT * FROM videos WHERE player_id = '".$id."' ");
    $get_videos->execute();
    echo json_encode($get_videos->fetchAll());
  }

}

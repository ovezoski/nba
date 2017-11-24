<?php

class player extends model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id){

    $firstname = $_POST["firstname"];

    for($i = 0; $i < count($firstname); $i++ ){

      $query = $this->db->prepare("INSERT INTO players (firstname, lastname, origin, num, age, team_id, position, weight, height, debut, years) VALUES (:firstname , :lastname , :origin , :num , :age , :team_id , :position , :weight , :height , :debut, :years )");
      $query->execute(array(
        ':firstname' => $_POST['firstname'][$i],
        ":lastname" => $_POST['lastname'][$i],
        ":origin" => $_POST['origin'][$i],
        ":num" => $_POST['num'][$i],
        ":age" => $_POST['age'][$i],
        ":team_id" => $id,
        ":position" => $_POST['position'][$i],
        ":weight" => $_POST['weight'][$i],
        ":height" => $_POST['height'][$i],
        ":debut" => $_POST['debut'][$i],
        ":years" => $_POST['years'][$i]
      ));
    }
  }

  public function update($id)//s
  {
    $set = "";
    foreach($_POST as $key=>$value){
      if($key != 'submit'){
        if($set){
          $set =  $set.", ";
        }
        $set=$set.$key." = '".$value."' ";
      }
    }

   $update = $this->db->prepare("UPDATE players SET ".$set." WHERE id='".$_POST['id']."' ");
   $update->execute();
  }


  public function get($player_id= false)//s
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


  public function delete($id)//s
  {
    $delete = $this->db->prepare("DELETE FROM players WHERE id='".$id."' ");
    $delete->execute();
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
    $add_link->execute();
  }

  public function getVideos($id=false)//s
  {
    $get_videos = $this->db->prepare("SELECT * FROM videos WHERE player_id = '".$id."' ");
    $get_videos->execute();
    echo json_encode($get_videos->fetchAll());
  }

}

<?php

/**
 *
 */
class video extends model
{

  function __construct()
  {
    parent::__construct();
  }

  public function FunctionName($value='')
  {
  }

  public function create($id)
  {
    $video = $_POST['video'];
        $add_video = $this->db->prepare("INSERT INTO videos (player_id, link) VALUES('".$id."', '".$video."')");
        $add_video->execute();
//        print_r($add_video);

      header("location: ".URL."/players/edit/".$id);
  }

  public function delete($id)
  {
    $delete_video = $this->db->prepare("DELETE from videos where id= :id");
    $delete_video->execute(array(':id' => $id ));
    echo "deleted ".$id;
  }
}


  ?>

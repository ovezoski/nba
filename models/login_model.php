<?php
/**
 *
 */
class login_model extends Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function login(){

    $password_hash = md5($_POST['password']);
    $query = $this->db->prepare("SELECT * FROM users WHERE username = '".$_POST['username']."' AND password='".$password_hash."' ");
   $query->execute();


    echo "<br/> username: ".$password_hash." <br/> ";
    $data  =$query->fetchAll();
    print_r($query->rowCount());
    if($query->rowCount()){
      session::set("logedIn", true);
      header("location: ".URL."/post/preview");
    }
  }

  public static function logout(){
    Session::destroy("logedIn");
  }


}


 ?>

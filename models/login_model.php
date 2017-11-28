<?php
/**
 *
 */
class login extends Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function login(){
    $password_hash = md5($_POST['password']);
	$query = $this->db->prepare("SELECT * FROM users WHERE username='".$_POST['username']."' AND password='".$password_hash."' ");
    $query->execute();


    if($query->rowCount()){
	session::set("logedIn", true);
      header("location: ".URL."/admin");
    }else{
	header("location: ".URL."/login/login");
	}
  }

  public static function logout(){
    Session::destroy("logedIn");
  }


}


 ?>
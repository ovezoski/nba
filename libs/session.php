<?php

/**
 *
 */
class Session
{

  public static function init(){
    session_start();
  }

  public static function set($key, $value){
    $_SESSION[$key] = $value;
  }

  public static function get($key){
    if(isset($_SESSION[$key]) ){
      return $_SESSION[$key];
    }
    return false;
  }

  public static function destroy($unset = false){
    if($unset){
        unset($_SESSION[$unset]);
    }
      session_destroy();


  }

  public static function auth(){
    if(!session::get("logedIn")){
        header("location: ".URL."/login ");
    }
  }

}


 ?>

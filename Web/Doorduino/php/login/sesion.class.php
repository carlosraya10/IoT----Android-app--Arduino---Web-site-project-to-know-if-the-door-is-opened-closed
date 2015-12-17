<?php
class sesion {
  function __construct() {

      /* For PHP 5.4 or later
      $status = session_status();
      if($status == PHP_SESSION_NONE){
          //There is no active session
          session_start();
      }else
      if($status == PHP_SESSION_DISABLED){
          //Sessions are not available
      }else
      if($status == PHP_SESSION_ACTIVE){
          //Destroy current and start new one
          session_destroy();
          session_start();
      }*/
      //For before PHP 4.3
      session_start();
  }


  public function set($name, $value) {
     $_SESSION [$name] = $value;
  }
  public function get($name) {
     if (isset ( $_SESSION [$name] )) {
        return $_SESSION [$name];
     } else {
         return false;
     }
  }
  public function delete_variable($name) {
      unset ( $_SESSION [$name] );
  }
  public function end_sesion() {
      $_SESSION = array();
      session_destroy ();
  }


//To recover only the nick name without have the encrypted sha1(user);
  public function setNick($nickName, $nickvalue) {
     $_SESSION [$nickName] = $nickvalue;
  }
  public function getNick($nickName) {
     if (isset ( $_SESSION [$nickName] )) {
        return $_SESSION [$nickName];
     } else {
         return false;
     }
  }

  public function delete_variableNick($nickname) {
      unset ( $_SESSION [$nickname] );
  }

}
?>
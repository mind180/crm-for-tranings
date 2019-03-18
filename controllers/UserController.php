<?php

  require_once './models/User.php';

  class UserController{


    // Encrypt cookie
    function encryptCookie( $value ) {
      $key = 'youkey';
      $newvalue = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $key ), $value, MCRYPT_MODE_CBC, md5( md5( $key ) ) ) );
      return( $newvalue );
    }

    // Decrypt cookie
    function decryptCookie( $value ) {
      $key = 'youkey';
      $newvalue = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $key ), base64_decode( $value ), MCRYPT_MODE_CBC, md5( md5( $key ) ) ), "\0");
      return( $newvalue );
    }

    public function actionLogin(){

      $data = $_POST;


      if( isset($data["do_login"] ) )
      {
        if( !empty($data['remember_me']) )
        {
          setcookie("login", $data['username'], time() + (3600 * 24 * 30) );
          setcookie("password", $this->encryptCookie($data["password"]), time() + (3600 * 24 * 30) );
        }
        $login = $data['username'];
        $password = $data['password'];

        //---------------------errors---------------
        $errors = array();
        //validation
        if( trim($login) == '' )
        {
          $errors[] = 'Enter login';
        }
        if( trim($password) == '' )
        {
          $errors[] = 'Enter password';
        }
        //--------------------------------------------errors

        $userId = User::checkUserData($login, $password);

        if( $userId == false )
        {
          $errors[] = 'Wrong login or password';
        }
        else
        {
          User::auth($userId);
          header("location: /manage");
          //return true;
        }
      }

      include_once( ROOT.'/views/login.php' );
    }


    public function actionLogout(){
      session_start();
      unset( $_SESSION["user"] );
      header("Location: /");
    }



    public function actionRegistration(){

      $data = $_POST;
      if( isset($data['do_reg']) ){

        if( ($userId = User::registerUser($data) ) != 0 ){
          User::auth($userId);
          header("location: /main");
        }

      }

      include_once( ROOT . '/views/registration.html' );
    }

  }

?>

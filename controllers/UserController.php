<?php

  require_once './models/User.php';

  class UserController{



    public function actionLogin(){

      $data = $_POST;


      if( isset($data["do_login"] ) )
      {
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
          header("location: /main");
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

<?php

  include_once( './components/Db.php' );

  class User{


    /**
    *retrive record, check login, password and return user ID if its match,
    *else return false
    *@return int
    */
    public static function checkUserData($login, $password){

      Db::setConnection();

      $user = R::findOne('users', 'login = ?', array($login) );

      //login right
      if( $user != NULL ){
          //!!!!!!!!!!!change to verify and hashing
          if( password_verify( $password, $user->password) ){
            return $user->id;
          }
      }
      R::close();
      return false;
    }


    public static function auth($userId){
      session_start();
      $_SESSION['user'] = $userId;
    }


    public static function registerUser( $data ){

      Db::setConnection();

      $user = R::dispense("users");
      $user->login =  $data["login"];
      $user->first_name = $data["first_name"];
      $user->last_name = $data["last_name"];
      $user->email = $data["email"];
      $user->job_title = $data["job_title"];
      $user->phone = $data["phone"];
      $user->company = $data["company"];
      $user->employee = $data["employee"];

      $user->password = password_hash( $data["password"], PASSWORD_DEFAULT );
      $result = R::store($user);

      R::close();
      return $result;
    }



  }

?>

<?php

  require "libs/rb.php";

  class Db{


    public static function setConnection(){
      R::setup( 'mysql:host=localhost;dbname=trainingcrm',
        'root', 'root' ); //for both mysql or mariaDB



    }


  }

?>

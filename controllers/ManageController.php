<?php

include_once( "RequestHandler.php" );

class ManageController{


  function actionIndexer( $requestObjectName ){



    $HandlerName = ucfirst($requestObjectName)."RequestHandler";

    $requestHandler = new $HandlerName();
    $requestHandler->handleRequest();

    include_once("./views/home.php");
  }




}




?>

<?php

include_once( "RequestHandler.php" );

class ManageController{


  function actionIndexer( $requestObjectName, $method="select" ){

    $HandlerName = ucfirst($requestObjectName)."RequestHandler";

    $requestHandler = new $HandlerName();
    $requestHandler->handleRequest($method);

    //include_once("./views/home.php");
  }


  function actionHome(){

    include_once("./views/home.php");

  }




}




?>

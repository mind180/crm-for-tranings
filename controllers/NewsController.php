<?php

  class NewsController{


    public function actionIndex(){

      echo '<br> in actionIndex';
      session_destroy();
    }

    public function actionView($category, $id){
      echo '<br> actionView';
      echo '<br>' . $category;
      echo '<br>' . $id;
    }



  }


?>

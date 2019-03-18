<?php

include_once( "TableObject.php" );



abstract class RequestHandler{

  abstract public function getTableObject();

  public function handleRequest()
  {
    $tableObject = $this->getTableObject();
    $tableObject->test();
  }


}


class TrainingCoursesRequestHandler extends RequestHandler{

  public function getTableObject()
  {
    return new TableTrainingsCourse();
  }


}

class TrainingsRequestHandler extends RequestHandler{

  public function getTableObject()
  {
    return new TableTrainings();
  }


}



class ParticipantsRequestHandler extends RequestHandler{

  public function getTableObject()
  {
    return new TableParticipants();
  }

}


?>

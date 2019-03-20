<?php

include_once( "TableObject.php" );



abstract class RequestHandler{

  abstract public function getTableObject();

  public function handleRequest()
  {
    $tableDataSet = array();

    //create concreate tableObject
    $tableObject = $this->getTableObject();

    $tableDataSet["column_names"] = $tableObject->getTableColumnNames();

    $tableDataSet["records"] = $tableObject->getTableDataArray();

    echo json_encode($tableDataSet);

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

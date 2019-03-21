<?php

include_once( "TableObject.php" );



abstract class RequestHandler{

  //factory method
  abstract public function getTableObject();


  public function handleRequest($method)
  {
    $tableDataSet = array();

    $tableObject = $this->getTableObject();


    //$requestResult = $TableObject->$method();
    //echo $requestResult;


    $tableDataSet["column_names"] = $tableObject->getTableColumnNames();
    $tableDataSet["records"] = $tableObject->getTableDataArray();

    echo json_encode($tableDataSet);
  }

}


class TrainingCoursesRequestHandler extends RequestHandler{

  public function getTableObject()
  {
    return new TableObject("training_course");
  }


}

class TrainingsRequestHandler extends RequestHandler{

  public function getTableObject()
  {
    return new TableObject("trainings");
  }


}


class ParticipantsRequestHandler extends RequestHandler{

  public function getTableObject()
  {
    return new TableObject("participants");
  }

}


class ContactsRequestHandler extends RequestHandler{

  public function getTableObject()
  {
    return new TableObject("contacts");
  }

}

class OpportunitiesRequestHandler extends RequestHandler{

  public function getTableObject()
  {
    return new TableObject("opportunity");
  }

}

class ProductsRequestHandler extends RequestHandler{

  public function getTableObject()
  {
    return new TableObject("products");
  }

}

class SurveysRequestHandler extends RequestHandler{

  public function getTableObject()
  {
    return new TableObject("surveys");
  }

}


?>

<?php

include_once( "./models/Manager.php" );
/**
 * Every object of table must impament this interface
 */
abstract class TableObject
{

  abstract public function getTableDataArray();

  abstract public function getTableColumnNames();

  protected function retriveColumnNames($queryResult){

    $columnNames = array();
    foreach($queryResult as $row){
      $columnNames[] = $row->Field;
    }
    return $columnNames;
  }



}


class TableTrainingsCourse extends TableObject
{

  public function getTableDataArray(){

    $queryResult = Manager::getQueryResult("Select * FROM training_course");
    return $queryResult;
  }

  public function getTableColumnNames(){
    $queryResult = Manager::getQueryResult("SHOW columns FROM training_course");
    return $this->retriveColumnNames($queryResult);
  }

}


class TableParticipants extends TableObject
{

  public function getTableDataArray(){

    $queryResult = Manager::getQueryResult("Select * FROM participants");
    return $queryResult;
  }

  public function getTableColumnNames(){
    $queryResult = Manager::getQueryResult("SHOW columns FROM participants");
    return $this->retriveColumnNames($queryResult);
  }

}


class TableTrainings extends TableObject
{

  public function getTableDataArray(){

    $queryResult = Manager::getQueryResult("Select * FROM trainings");
    return $queryResult;
  }

  public function getTableColumnNames(){
    $queryResult = Manager::getQueryResult("SHOW columns FROM trainings");
    return $this->retriveColumnNames($queryResult);
  }

}


class TableContacts extends TableObject
{

  public function getTableDataArray(){

    $queryResult = Manager::getQueryResult("Select * FROM contacts");
    return $queryResult;
  }

  public function getTableColumnNames(){
    $queryResult = Manager::getQueryResult("SHOW columns FROM trainings");
    return $this->retriveColumnNames($queryResult);
  }

}


?>

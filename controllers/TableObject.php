<?php

include_once( "./models/Manager.php" );

/**
 *  work with concrete table
 *  constructor take name of table
 */
class TableObject
{

  var $objectName;

  public function __construct( $objectName ){
    $this->objectName = $objectName;
  }

  private function retriveColumnNames($queryResult){

    $columnNames = array();
    foreach($queryResult as $row){
      $columnNames[] = $row->Field;
    }
    return $columnNames;
  }

  public function getTableDataArray(){
    $queryResult = Manager::getQueryResult("Select * FROM $this->objectName");
    return $queryResult;
  }

  public function getTableColumnNames(){
    $queryResult = Manager::getQueryResult("SHOW columns FROM $this->objectName");
    return $this->retriveColumnNames($queryResult);
  }


  public function insertDataSet(){


    //db_manager insert


  }


}


?>

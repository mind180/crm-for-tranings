<?php

/**
 * Every object of table mast impament this interface
 */
interface TableObject
{
  public function test();
}


class TableTrainingsCourse implements TableObject{

  public function test(){
    echo "TableTrainingsCourse";
  }
}

class TableParticipants implements TableObject{

  public function test(){
    echo "TableParticipants";
  }
}


class TableTrainings implements TableObject{

  public function test(){
    echo "TableTrainings test";
  }
}


?>

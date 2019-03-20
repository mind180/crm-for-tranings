<?php


class Manager{

  public static function getQueryResult($query){

    // Create a new connection.
    // You'll probably want to replace hostname with localhost in the first parameter.
    // Note how we declare the charset to be utf8mb4.  This alerts the connection that we'll be passing UTF-8 data.  This may not be required depending on your configuration, but it'll save you headaches down the road if you're trying to store Unicode strings in your database.  See "Gotchas".
    // The PDO options we pass do the following:
    // PDO::ATTR_ERRMODE enables exceptions for errors.  This is optional but can be handy.
    // PDO::ATTR_PERSISTENT disables persistent connections, which can cause concurrency issues in certain cases.  See "Gotchas".
    $link = new PDO(    'mysql:host=localhost;dbname=trainingcrm;charset=utf8mb4',
                        'root',
                        'root',
                        array(
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_PERSISTENT => false
                        )
                    );

    $handle = $link->prepare( $query );

    //$handle->bindValue(1, 100);

    $handle->execute();

    // Using the fetchAll() method might be too resource-heavy if you're selecting a truly massive amount of rows.
    // If that's the case, you can use the fetch() method and loop through each result row one by one.
    // You can also return arrays and other things instead of objects.  See the PDO documentation for details.
    $queryResult = $handle->fetchAll(PDO::FETCH_OBJ);


    return $queryResult;
  }



}


?>

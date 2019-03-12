<?php

class TestController{


  private function saveImage( $name, $image )
  {
    $con = mysqli_connect("localhost", "root", "root")
      or die("Could not connect: " . mysql_error());
    mysqli_select_db( $con, "trainingcrm" );
    $qry = "insert into images (name, image) values ('$name','$image')";
    $result = mysqli_query($con, $qry);
    if($result )
    {
      echo "<br/>Image upload";
    }
    else
    {
      echo "<br/>Image not upload";
    }
  }

  private function getImage($name)
  {

    $con = mysqli_connect("localhost", "root", "root")
      or die("Could not connect: " . mysql_error());
    mysqli_select_db( $con, "trainingcrm" );
    $qry = "SELECT * FROM images WHERE name=\"$name\"";
    $result = mysqli_query($con, $qry);

    $row = mysqli_fetch_row($result);

    $arr = array( 'name' => $row[1], 'image' => $row[2] );
    $img = json_encode($arr);


    mysqli_close($con);

    return $img;
  }

  private function displayImage()
  {
    $con = mysqli_connect("localhost", "root", "root")
      or die("Could not connect: " . mysql_error());
    mysqli_select_db( $con, "trainingcrm" );
    $qry = "SELECT * FROM  images";
    $result = mysqli_query($con, $qry);

    //echo "<ul>";
    $images = array();
    while( $row = mysqli_fetch_row($result) )
    {
      //echo "<li>";
      //echo '<img height="200" width="200" src="data:image;base64,'.$row[2].'"/>';
      //echo $row[1];
      $images[] = $row;
      //echo "</li>"
    }
    //echo "</ul>";
    mysqli_close($con);
    return $images;
  }

  public function actionTest()
  {
    //AJAX request of images
    if( isset($_POST['name']) )
    {
        $image = $this->getImage($_POST['name']);
        echo $image;
        return;
    }

    //Upload image
    if( isset($_POST['submit']) && isset($_FILES['image']) )
    {
        if( getimagesize($_FILES['image']['tmp_name']) == false )
        {
          echo "<br/>Select image!<br/>";
        }
        else
        {
          $image = addslashes( $_FILES['image']['tmp_name'] );
          $name = addslashes( $_FILES['image']['name'] );
          $image = file_get_contents( $image );
          $image = base64_encode($image);

          $this->saveImage( $name, $image );
        }
    }

    include_once(ROOT."/views/test.php");
  }


}

?>

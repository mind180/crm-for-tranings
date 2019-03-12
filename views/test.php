<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Testing</title>
  <link rel="stylesheet" href="./templates/css/test.css" >
</head>
<body>

  <?php $images = $this->displayImage(); ?>
  <ul>
    <?php
      foreach ($images as $index => $img) {
        echo  "<li>". $img[1];
        //echo  "<img width=\"200\" height=\"200\" src=\"data:image;base64, $img[2] \" >";
        "</li>";
      }
    ?>
  </ul>

  <form method="post" action="/test" enctype="multipart/form-data">

    <input type="file" name="image"><br/><br/>
    <input type="submit" name="submit" value="Upload">

  </form>

  <div >
    <img id="imageBoard" width="200" height="200" src="" >
  </div>

  <script  src="../templates/js/test.js" ></script>
</body>
</html>

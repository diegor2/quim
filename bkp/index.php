<html>
  <head>
    <?php $k = $_GET['k']; ?>
    <title>Quote Image Maker</title>
    <style>
      body {
        background-color: #000000;
        color: #ffffff;
        text-align:center;
      }
      input.hint {
        color: dddddd;
      }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>    
    <script>
      $(document).ready(function(){
      });
    </script>
  </head>
  <body>
  <img src="quim.png"/>
    <form action="/labs/quim/" method="get">
      <input type="text" class="text" name="k" value="<?php echo $k ?>"/>
      <input type="submit" value="make"/>
    </form>
    <?php
      if($k){
        echo '<img src="quim.php?k=' . $k . '"><br>'; 
      }
    ?>
  </body>
<html>
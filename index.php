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
      var c=document.getElementById("myCanvas");
var ctx=c.getContext("2d");
var img=document.getElementById("quote");
ctx.drawImage(img,0,0);
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
        echo '<img id="quote" src="quim.php?k=' . $k . '"><br>'; 
      }
    ?>
      <canvas id="myCanvas" width="500" height="1000"></canvas> 
  </body>
<html>
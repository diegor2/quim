<?php
      $flickrkey = "bf6880f2f4dc8fa7e7d2cdde7c248ba3";
      $fbid = "409451755740547";
      $keywords = $_GET['k'];

      if($keywords){
      
        $curl = curl_init();
        curl_setopt ($curl, CURLOPT_URL,
          'http://api.flickr.com/services/rest/' .
          '?method=flickr.photos.search' . 
          '&api_key=' . $flickrkey .
          '&text=' . $keywords .
          '&format=json&nojsoncallback=1');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        
        $result = json_decode(curl_exec ($curl), true);    
        $photos = $result['photos']['photo'];
        
        shuffle($photos);
	$p=$photos[0];
        curl_setopt($curl, CURLOPT_URL, 
          'http://farm' . $p['farm'] . 
          '.staticflickr.com/' . $p['server'] . 
          '/' . $p['id'] . '_' . $p['secret'] . '.jpg');
        $result = curl_exec($curl);
        $img = imagecreatefromstring($result);    
        $img_width = imagesx($img);

        curl_setopt($curl, CURLOPT_URL, 
          'http://www.iheartquotes.com/api/v1/random');
        $quote = html_entity_decode(curl_exec($curl));
        
        $char_width = imagefontwidth(5);
        $char_height = imagefontheight(5);

        $color = imagecolorallocate($img, 255, 0, 0);
        $len = strlen($quote);
        
        $x = 0;
        $y = 0;
        
        for($i=0; $i<$len; $i++){
          $x = $x + 1;
          if(($x * $char_width) > $img_width){
            $x = 0;    
            $y = $y + 1;
          }
          imagechar($img, 5, $x * $char_width , $y * $char_height, $quote, $color);
          $quote = substr($quote, 1);      
        }

        header('Content-type: image/jpeg');
        imagejpeg($img);
        curl_close ($curl);
      }
      
    ?>
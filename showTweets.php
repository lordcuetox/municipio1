<?php

        include('clases/TwitterAPIExchange.php');
 
        $settings = array(
            'oauth_access_token' => "202237409-KVofLCa8p0zlHvwd5jEVcxkzFqURCsXEZ3BLWI4Y",
            'oauth_access_token_secret' => "SWNIgs0xsjDNZeSxpREV5YZPh8fKBEIabLOqbC0mDRRFO",
            'consumer_key' => "I38QVSxTiPM9rXFq98s8pRXDK",
            'consumer_secret' => "8Onn9wuGaxEaRgq9imDo33b4F6zrMRWM55DvULLMo9QL8TnVjz");
 
        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?screen_name=A_Macuspana&count=1';        
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        echo $twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();
?>
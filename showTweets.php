<?php

    $request_url ="https://api.twitter.com/1/help/test.json";
    $srvstamp = time();     // ---- server timestamp ---- 
    $twheader = get_headers($request_url, 1);   // ---- array with ['Date'] string
    $twistamp = strtotime($twheader['date']);   // -- twitter timestamp
    echo "
     Server: ".date("Y.m.d (H:i:s)",$srvstamp)." - ".$srvstamp." \r\n";
    echo "
     Twitter: ".date("Y.m.d (H:i:s)",$twistamp)." - ".$twistamp." \r\n";
    //The diference between my server and twitter is/
    echo $twistamp - $srvstamp;
        include('clases/TwitterAPIExchange.php');
 
        $settings = array(
            'oauth_access_token' => "202237409-KVofLCa8p0zlHvwd5jEVcxkzFqURCsXEZ3BLWI4Y",
            'oauth_access_token_secret' => "SWNIgs0xsjDNZeSxpREV5YZPh8fKBEIabLOqbC0mDRRFO",
            'consumer_key' => "I38QVSxTiPM9rXFq98s8pRXDK",
            'consumer_secret' => "8Onn9wuGaxEaRgq9imDo33b4F6zrMRWM55DvULLMo9QL8TnVjz");
 
        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?screen_name=LordCuetox&count=1';        
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        echo $twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();
?>
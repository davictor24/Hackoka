<?php
	// Reads the variables sent via POST from our gateway
    $sessionId = $_POST["sessionId"];
    $serviceCode = $_POST["serviceCode"];
    $phoneNumber = $_POST["phoneNumber"];
    $text = $_POST["text"];

    if ($text == "") {
        // This is the first request. 
        $response = "CON Select data source: \n\n";
        $response .= "1. Wikipedia \n";
        $response .= "2. DuckDuckGo \n";
        $response .= "3. Longman Dictionary";
    }

    else if (preg_match("/(1|2|3|4)\*/", $text)) {
    	// query public APIs
//     	$data = explode("*", $text); 
//     	$l = count($data); 

	switch ("1") {
//     	switch ($data[$l - 2]) {
    		case "1":
//     			$curl = curl_init();
//     			curl_setopt_array($curl, array(
// 				    CURLOPT_RETURNTRANSFER => 1,
// 				    CURLOPT_URL => "https://en.wikipedia.org/w/api.php?action=opensearch&search=" . 
// 				    str_replace(" ", "%20", $data[$l - 1]) . 
// 				    "&limit=1&format=json",
// 				    CURLOPT_USERAGENT => 'Victor'
// 				));
// 				$res = curl_exec($curl);
// 				curl_close($curl);

//     			$arr = json_decode($res, true); 
//     			$response = "END " . (($arr[2][0] == "") ? "We were unable to find anything. Please try searching for something else." : $arr[2][0]); 
    			$response = "END Sample response"; 
			break; 

    		case "2":
//     		    $curl = curl_init();
//     			curl_setopt_array($curl, array(
// 				    CURLOPT_RETURNTRANSFER => 1,
// 				    CURLOPT_URL => "https://api.duckduckgo.com/?q=" . 
// 				    str_replace(" ", "+", $data[$l - 1]) . 
// 				    "&format=json&pretty=1",
// 				    CURLOPT_USERAGENT => 'Victor'
// 				));
// 				$res = curl_exec($curl);
// 				curl_close($curl);

//     			$arr = json_decode($res, true); 

//     			if ($arr["AbstractText"] != "") $response = "END " . $arr["AbstractText"]; 
//     			elseif ($arr["RelatedTopics"][0]["Text"] != "") $response = "END " . $arr["RelatedTopics"][0]["Text"]; 
//     			else $response = "END We were unable to find anything. Please try searching for something else."; 
    			break; 

    		case "3":
//     			$curl = curl_init();
//     			curl_setopt_array($curl, array(
// 				    CURLOPT_RETURNTRANSFER => 1,
// 				    CURLOPT_URL => "http://api.pearson.com/v2/dictionaries/ldoce5/entries?headword=" . 
// 				    str_replace(" ", "+", $data[$l - 1]),
// 				    CURLOPT_USERAGENT => 'Victor'
// 				));
// 				$res = curl_exec($curl);
// 				curl_close($curl);

//     			$arr = json_decode($res, true); 

//     			$len = $arr["count"]; 
//     			$response = "END "; 

//     			if ($len == 0) $response .= "We were unable to find anything. Please try searching for something else."; 

//     			else {
//     				for ($i = 0; $i < $len; $i++)
//     					$response .= ($i + 1) . ". " . $arr["results"][$i]["senses"][0]["definition"][0] . "\n"; 
//     			}
    			break; 
    	}
    }

    else if (substr($text, -1) == "1" || substr($text, -1) == "2" || substr($text, -1) == "3" || substr($text, -1) == "4") {
    	// Second level response
    	$response = "CON Enter search keyword(s) \n";
    }

    else {
    	// Error handler
    	$response = "CON Invalid selection, please try again. \n\n";
    	$response .= "Select data source: \n\n";
    	$response .= "1. Wikipedia \n";
    	$response .= "2. DuckDuckGo \n";
    	$response .= "3. Longman Dictionary";
    }


    // Print the response onto the page so that our gateway can read it
    header('Content-type: text/plain;charset=utf-8');
    echo $response;
?>

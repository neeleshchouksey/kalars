<?php
function sendsmsGET($mobileNumber,$message,$senderId="smssms",$routeId=1, $serverUrl="msg.msgclub.net", $authKey="ef9581c76159cecd57c6ef96cb6aceee", $smsContentType="english")
{
    $getData = 'mobileNos='.$mobileNumber.'&message='.urlencode($message).'&senderId='.$senderId.'&routeId='.$routeId.'&smsContentType='.$smsContentType;

    //API URL
    $url="http://".$serverUrl."/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authKey."&".$getData;

	//amit api
	$url="http://sms.abinfotech.net/api/sendhttp.php?authkey=154573ApPHFpPuJZS592ff57c&mobiles=91".$mobileNumber."&message=".urlencode($message)."&sender=klrsms&route=4&country=91";

	$url="http://sms.advisorycrm.com/api/sendhttp.php?authkey=154573ApPHFpPuJZS592ff57c&mobiles=91".$mobileNumber."&message=".urlencode($message)."&sender=klrsms&route=4&country=91";

	//$url="http://sms.advisorycrm.com/api/sendhttp.php?authkey=154573ApPHFpPuJZS592ff57c&mobiles=917771983222&message=hellos&sender=klrsms&route=4&country=91";

    // init the resource
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYHOST => 91,
        CURLOPT_SSL_VERIFYPEER => 0

    ));

    //get response
    $output = curl_exec($ch);

    //Print error if any
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }

    curl_close($ch);

    return $output;
}


function sendsmsPOST($mobileNumber,$senderId,$routeId,$message,$serverUrl,$authKey)
{

    //Prepare you post parameters
    $postData = array(
        
        'mobileNumbers' => $mobileNumber,        
        'smsContent' => $message,
        'senderId' => $senderId,
        'routeId' => $routeId,		
        "smsContentType" =>'english'
    );


    $data_json = json_encode($postData);


    $url="http://".$serverUrl."/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authKey;


    // init the resource
    $ch = curl_init();

    

    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_HTTPHEADER => array('Content-Type: application/json','Content-Length: ' . strlen($data_json)),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $data_json,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0
    ));

    //get response
    $output = curl_exec($ch);

    //Print error if any
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }
    curl_close($ch);
    return $output;
}



?>
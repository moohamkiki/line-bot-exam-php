<?php
    $accessToken = "OKp94drK8e/Vjgx6U8cQj8HmpzeREco9LNFv+4F7UUM+12pfhS+f9P0X2qD4N6CDyqfWtwlrPvH/deA8wxyye8Z96Cx+z1qerbRumV/EqNt5QbrdSe0+IIJCMTBHy/SvwwqdcDPr2iA2HforJPLWWQdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
#ตัวอย่าง Message Type "Text"
    if($message == "cause" || $message == "Cause" || $message == "num" ||$message == "Num" || $message == "Help" ||$message == "help" || $message == "." ){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "1EN - Unallocated (unassigned) number.\n2EN - No route to specified transit network (national use).\n3EN - No route to destination.\n4EN - send special information tone.\n5EN - misdialed trunk prefix (national use).\n6EN - channel unacceptable.\n7EN - call awarded. being delivered in an established channel.\n8EN - preemption.\n9EN - preemption - circuit reserved for reuse\n16EN - normal call clearing.\n17EN - user busy.\n18EN - no user responding.\n19EN - no answer from user (user alerted).\n20EN - subscriber absent.\n21EN - call rejected.\n22EN - number changed.\n26EN - non-selected user clearing.\n27EN - destination out of order.\nEN28 - invalid number format (address incomplete).\n29EN - facilities rejected.\n30EN - response to STATUS INQUIRY.\n31EN - normal. unspecified.\n34EN - no circuit/channel available.\n35EN - Call Queued.\n38EN - network out of order.\n39EN - permanent frame mode connection out-of-service.\n40EN - permanent frame mode connection operational.\n41EN - temporary failure.\n42EN - switching equipment congestion.\n43EN - access information discarded.\n44EN - requested circuit/channel not available.\n46EN - precedence call blocked.\nEN47 - resource unavailable, unspecified.\n49EN - Quality of Service not available.\n50EN - requested facility not subscribed.\n52EN - outgoing calls barred.\n53EN - outgoing calls barred within CUG.\n54EN - incoming calls barred\n55EN - incoming calls barred within CUG.\n57EN - bearer capability not authorized.\n58EN - bearer capability not presently available.\n62EN - inconsistency in outgoing information element.\n63EN - service or option not available. unspecified.\n65EN - bearer capability not implemented.\n66EN - channel type not implemented.\n69EN - requested facility not implemented.\n70EN - only restricted digital information bearer capability is available.\n79EN - service or option not implemented unspecified.\n81EN - invalid call reference value.\n82EN - identified channel does not exist.\n83EN - a suspended call exists, but this call identify does not.\n84EN - call identity in use.\n85EN - no call suspended.\n86EN - call having the requested call identity has been cleared.\n87EN - user not a member of CUG.\n88EN - incompatible destination.\n90EN - non-existent CUG.\n91EN - invalid transit network selection (national use).\n95EN - invalid message, unspecified.\n96EN - mandatory information element is missing.\n97EN - message type non-existent or not implemented.\n98EN - message not compatible with call state or message type non-existent.\n99EN - Information element / parameter non-existent or not implemented.\n100EN - Invalid information element contents.\n101EN - message not compatible with call state.\n102EN - recovery on timer expiry.\n 103EN - parameter non-existent or not implemented - passed on (national use).\n110EN - message with unrecognized parameter discarded.\n111EN - protocol error, unspecified.\n127EN - Intel-working, unspecified.";
        replyMsg($arrayHeader,$arrayPostData);     
    }
     else if($message == "1EN" || $message ==  "1en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. l - Unallocated (unassigned) number.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the destination requested by the calling user cannot be reached because, although the number is in a valid format, it is not currently assigned (allocated).";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "What it usually means:\n 1.The SPIDS may be incorrectly entered in the router or the Telco switch, giving a SPID failure in the router logs.\n 2.The ISDN phone number being dialed by the router is invalid and the telco switch cannot locate the number to complete the call, as it is invalid.\n 3.On long distance calls, the call cannot be properly routed to its destination.";
         replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "2EN" || $message ==  "2en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 2 - No route to specified transit network (national use).";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the equipment sending this cause has received a request to route the call through a particular transit network which it does not recognize. The equipment sending this cause does not recognize the transit network either because the transit network does not exist or because that particular transit network not serve the equipment which is sending this cause.";
         replyMsg($arrayHeader,$arrayPostData);
    }
function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }

   exit;
?>

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
        $arrayPostData['messages'][0]['text'] = "1EN - Unallocated (unassigned) number.\n2EN - No route to specified transit network (national use).\n3EN - No route to destination.\n4EN - send special information tone.\n5EN - misdialed trunk prefix (national use).\n6EN - channel unacceptable.\n7EN - call awarded. being delivered in an established channel.\n8EN - preemption.\n9EN - preemption - circuit reserved for reuse\n16EN - normal call clearing.\n17EN - user busy.\n18EN - no user responding.\n19EN - no answer from user (user alerted).\n20EN - subscriber absent.\n21EN - call rejected.\n22EN - number changed.\n26EN - non-selected user clearing.\n27EN - destination out of order.\nEN28 - invalid number format (address incomplete).\n29EN - facilities rejected.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "30EN - response to STATUS INQUIRY.\n31EN - normal. unspecified.\n34EN - no circuit/channel available.\n35EN - Call Queued.\n38EN - network out of order.\n39EN - permanent frame mode connection out-of-service.\n40EN - permanent frame mode connection operational.\n41EN - temporary failure.\n42EN - switching equipment congestion.\n43EN - access information discarded.\n44EN - requested circuit/channel not available.\n46EN - precedence call blocked.\nEN47 - resource unavailable, unspecified.\n49EN - Quality of Service not available.\n50EN - requested facility not subscribed.\n52EN - outgoing calls barred.\n53EN - outgoing calls barred within CUG.\n54EN - incoming calls barred\n55EN - incoming calls barred within CUG.";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "57EN - bearer capability not authorized.\n58EN - bearer capability not presently available.\n62EN - inconsistency in outgoing information element.\n63EN - service or option not available. unspecified.\n65EN - bearer capability not implemented.\n66EN - channel type not implemented.\n69EN - requested facility not implemented.\n70EN - only restricted digital information bearer capability is available.\n79EN - service or option not implemented unspecified.\n81EN - invalid call reference value.\n82EN - identified channel does not exist.\n83EN - a suspended call exists, but this call identify does not.\n84EN - call identity in use.\n85EN - no call suspended.\n86EN - call having the requested call identity has been cleared.\n";  
        $arrayPostData['messages'][3]['type'] = "text";
        $arrayPostData['messages'][3]['text'] = "87EN - user not a member of CUG.\n88EN - incompatible destination.\n90EN - non-existent CUG.\n91EN - invalid transit network selection (national use).\n95EN - invalid message, unspecified.\n96EN - mandatory information element is missing.\n97EN - message type non-existent or not implemented.\n98EN - message not compatible with call state or message type non-existent.\n99EN - Information element / parameter non-existent or not implemented.\n100EN - Invalid information element contents.\n101EN - message not compatible with call state.\n102EN - recovery on timer expiry.\n 103EN - parameter non-existent or not implemented - passed on (national use).\n110EN - message with unrecognized parameter discarded.\n111EN - protocol error, unspecified.\n127EN - Intel-working, unspecified.";  
           replyMsg($arrayHeader,$arrayPostData);     
    }
     else if($message == "1EN" || $message ==  "1en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 1 - Unallocated (unassigned) number.";
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
     else if($message == "3EN" || $message ==  "3en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 3 - No route to destination.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the called party cannot be reached because the network through which the call has been routed does not serve the destination desired. This cause is supported on a network dependent basis.";
            replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "4EN" || $message ==  "4en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 4 - send special information tone.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the called party cannot be reached for reasons that are of a long term nature and that the special information tone should be returned to the calling party.";
            replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "1EN" || $message ==  "5en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 5 - misdialed trunk prefix (national use).";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates the erroneous inclusion of a trunk prefix in the called party number. This number is to sniped from the dialed number being sent to the network by the customer premises equipment.";
            replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "6EN" || $message ==  "6en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 6 - channel unacceptable.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the channel most recently identified is not acceptable to the sending entity for use in this call.";
            replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "7EN" || $message ==  "7en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 7 - call awarded. being delivered in an established channel.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the user has been awarded the incoming call and that the incoming call is being connected to a channel already established to that user for similar calls (e.g. packet-mode x.25 virtual calls).";
            replyMsg($arrayHeader,$arrayPostData);
    }
    else if($message == "8EN" || $message ==  "8en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 8 - preemption.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates the call is being preempted.";
            replyMsg($arrayHeader,$arrayPostData);
    }
    else if($message == "9EN" || $message ==  "9en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 9 - preemption - circuit reserved for reuse.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the call is being preempted and the circuit is reserved for reuse by the preempting exchange.";
            replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "16EN" || $message ==  "16en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 16 - normal call clearing.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the call is being cleared because one of the users involved in the call has requested that the call be cleared.";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "What it means:\nThis could be almost anything; it is the vaguest of the cause codes. The call comes down normally, but the reasons for it could be:\n 1.Bad username or password\n 2.Router's settings do not match what is expected by the remote end.\n 3.Telephone line problems.\n 4.Hung session on remote end.";    
            replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "17EN" || $message ==  "17en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 17 - user busy.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause is used to indicate that the called party is unable to accept another call because the user busy condition has been encountered. This cause value may be generated by the called user or by the network. In the case of user determined user busy it is noted that the user equipment is compatible with the call.";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "What is means:\nCalling end is busy.";   
           replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "18EN" || $message ==  "18en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 18 - no user responding.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause is used when a called party does not respond to a call establishment message with either an alerting or connect indication within the prescribed period of time allocated.";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "What it means:\nThe equipment on the other end does not answer the call. Usually this is a misconfiguration on the equipment being called.";    
            replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "19EN" || $message ==  "19en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 19 - no answer from user (user alerted).";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause is used when the called party has been alerted but does not respond with a connect indication within a prescribed period of time. Note - This cause is not necessarily generated by Q.931 procedures but may be generated by internal network timers.";
            replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "20EN" || $message ==  "20en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 20 - subscriber absent.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause value is used when a mobile station has logged off. Radio contact is not obtained with a mobile station or if a personal telecommunication user is temporarily not addressable at any user-network interface.";
            replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "21EN" || $message ==  "21en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 21 - call rejected.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the equipment sending this cause does not wish to accept this call. although it could have accepted the call because the equipment sending this cause is neither busy nor incompatible. This cause may also be generated by the network, indicating that the call was cleared due to a supplementary service constraint. The diagnostic field may contain additional information about the supplementary service and reason for rejection.";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "What it means:\nThis is usually a telco issue. The call never reaches the final destination, which can be caused by a bad switch translation, or a misconfiguration on the equipment being called.";    
            replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "22EN" || $message ==  "22en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 22 - number changed.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause is returned to a calling party when the called party number indicated by the calling party is no longer assigned. The new called party number may optionally be included in the diagnostic field. If a network does not support this cause, cause no. 1, unallocated (unassigned) number shall be used.";
            replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "26EN" || $message ==  "26en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 26 - non-selected user clearing.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the user has not been awarded the incoming call.";
            replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "27EN" || $message ==  "27en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 27 - destination out of order.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the destination indicated by the user cannot be reached because the interface to the destination is not functioning correctly. The term \"not functioning correctly\" indicates that a signal message was unable to be delivered to the remote party; e.g., a physical layer or data link layer failure at the remote party or user equipment off-line.";
            replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "28EN" || $message ==  "28en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 28 - invalid number format (address incomplete).";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the called party cannot be reached because the called party number is not in a valid format or is not complete.";
            replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "29EN" || $message ==  "29en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 29 - facilities rejected.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause is returned when a supplementary service requested by the user cannot be provide by the network.";
            replyMsg($arrayHeader,$arrayPostData);
    }
     else if($message == "30EN" || $message ==  "30en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 30 - response to STATUS INQUIRY.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause is included in the STATUS message when the reason for generating the STATUS message was the prior receipt of a STATUS INQUIRY.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "31EN" || $message ==  "31en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 31 - normal. unspecified.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause is used to report a normal event only when no other cause in the normal class applies.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "34EN" || $message ==  "34en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 34 - no circuit/channel available.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that there is no appropriate circuit/channel presently available to handle the call.";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "What it means:\nThere is no place on the Public Telephone network to place the call; the call never gets to its destiation. This is usually a temporary problem.";    
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "35EN" || $message ==  "35en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 35 - Call Queued.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "38EN" || $message ==  "38en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 38 - network out of order.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the network is not functioning correctly and that the condition is likely to last a relatively long period of time e.g., immediately re-attempting the call is not likely to be successful.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "39EN" || $message ==  "39en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 39 - permanent frame mode connection out-of-service.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause is included in a STATUS message to indicate that a permanently established frame mode connection is out-of-service (e.g. due to equipment or section failure)";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "40EN" || $message ==  "40en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 40 - permanent frame mode connection operational.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause is included in a STATUS message to indicate that a permanently established frame mode connection is operational and capable of carrying user information.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "41EN" || $message ==  "41en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 41 - temporary failure.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the network is not functioning correctly and that the condition is no likely to last a long period of time; e.g., the user may wish to try another call attempt almost immediately.";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "What it means:\n This means that there is a temporary failure at the physical layer on the ISDN network. If you remove the ISDN cable from the Netopia, you would see this. It's usually temporary.";   
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "42EN" || $message ==  "42en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 42 - switching equipment congestion.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the switching equipment generating this cause is experiencing a period of high traffic.";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "What it means:\n Just too much going on at this point on the ISDN network to get the call through to its destination.";    
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "43EN" || $message ==  "43en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 43 - access information discarded.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the network could not deliver access information to the remote user as requested. i.e., user-to-user information, low layer compatibility, high layer compatibility or sub-address as indicated in the diagnostic. It is noted that the particular type of access information discarded is optionally included in the diagnostic.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "44EN" || $message ==  "44en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 44 - requested circuit/channel not available.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause is returned when the circuit or channel indicated by the requesting entity cannot be provided by the other side of the interface.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "46EN" || $message ==  "46en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 46 - precedence call blocked.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that there are no predictable circuits or that the called user is busy with a call of equal or higher preventable level.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "47EN" || $message ==  "47en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 47 - resource unavailable, unspecified.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause is used to report a resource unavailable event only when no other cause in the resource unavailable class applies.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "49EN" || $message ==  "49en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 49 - Quality of Service not available.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause is used to report that the requested Quality of Service, as defined in Recommendation X.213. cannot be provided (e.g., throughput of transit delay cannot be supported).";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "50EN" || $message ==  "50en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 50 - requested facility not subscribed.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the user has requested a supplementary service which is implemented by the equipment which generated this cause but the user is not authorized to use.";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "What it means:\nThe switch looks at the number being dialed and thinks it is for another service rather than ISDN. If the phone number is put in the correct format, the call should be placed properly. There are no standards for this, all Telcos have their own system for programming the number formats that the switches will recognize. Some systems want to see 7 digits, some 10, and others 11.";   
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "52EN" || $message ==  "52en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 52 - outgoing calls barred.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "53EN" || $message ==  "53en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 53 - outgoing calls barred within CUG.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that although the calling party is a member of the CUG for the outgoing CUG call. Outgoing calls are not allowed for this member of the CUG.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "54EN" || $message ==  "54en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 54 - incoming calls barred";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "55EN" || $message ==  "55en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 55 - incoming calls barred within CUG.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that although the calling party is a member of the CUG for the incoming CUG call. Incoming calls are not allowed for this member of the CUG.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "57EN" || $message ==  "57en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 57 - bearer capability not authorized.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the user has requested a bearer capability which is implemented by the equipment which generated this cause but the user is not authorized to use.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "58EN" || $message ==  "58en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 58 - bearer capability not presently available.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the user has requested a bearer capability which is implemented by the equipment which generated this cause but which is not available at this time.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "62EN" || $message ==  "62en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 62 - inconsistency in outgoing information element.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates an inconsistency in the designated outgoing access information and subscriber class.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "63EN" || $message ==  "63en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 63 - service or option not available. unspecified.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause is used to report a service or option not available event only when no other cause in the service or option not available class applies.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "65EN" || $message ==  "65en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 65 - bearer capability not implemented.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the equipment sending this cause does not support the bearer capability requested.";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "What it means:\n 1.In most cases, the number being called is not an ISDN number but an analog destination.\n 2.The equipment is dialing at a faster rate than the circuitry allows, for example, dialing at 64K when only 56K is supported.";  
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "66EN" || $message ==  "66en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 66 - channel type not implemented.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the equipment sending this cause does not support the channel type requested.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "69EN" || $message ==  "69en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 69 - requested facility not implemented.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the equipment sending this cause does not support the requested supplementary services.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "70EN" || $message ==  "70en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 70 - only restricted digital information bearer capability is available.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the calling party has requested an unrestricted bearer service but the equipment sending this cause only supports the restricted version of the requested bearer capability.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "79EN" || $message ==  "79en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 79 - service or option not implemented unspecified.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause is used to report a service or option not implemented event only when no other cause in the service or option not implemented class applies.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "81EN" || $message ==  "81en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 81 - invalid call reference value.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the equipment sending this cause has received a message with a call reference which is not currently in use on the user-network interface.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "82EN" || $message ==  "82en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 82 - identified channel does not exist.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the equipment sending this cause has received a request to use a channel not activated on the interface for a call. For example, if a user has subscribed to those channels on a primary rate interface numbered from l to 12 and the user equipment or the network attempts to use channels 3 through 23, this cause is generated.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "83EN" || $message ==  "83en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 83 - a suspended call exists, but this call identify does not.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that a call resume has been attempted with a call identity which differs from that in use for any presently suspended call(s).";
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

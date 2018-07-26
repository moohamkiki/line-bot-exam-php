<?php
    $accessToken = "LdV9n8B1D81+KyUu3U7tNI+Xu+pDGGvB/kikQUmVh7WfXioccY1j3DlSLPqvF7ZRyqfWtwlrPvH/deA8wxyye8Z96Cx+z1qerbRumV/EqNucZ43xj9DZZJSBo15vBjmhmfixPzbAC2ej1YV5kOm2ZgdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    
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
        $arrayPostData['messages'][3]['text'] = "87EN - user not a member of CUG.\n88EN - incompatible destination.\n90EN - non-existent CUG.\n91EN - invalid transit network selection (national use).\n95EN - invalid message, unspecified.\n96EN - mandatory information element is missing.\n97EN - message type non-existent or not implemented.\n98EN - message not compatible with call state or message type non-existent.\n99EN - Information element / parameter non-existent or not implemented.\n100EN - Invalid information element contents.\n101EN - message not compatible with call state.\n102EN - recovery on timer expiry.\n 103EN - parameter non-existent or not implemented - passed on (national use).\n110EN - message with unrecognized parameter discarded.\n111EN - protocol error, unspecified.\n127EN - Intel-working, unspecified.\n128EN - Cause Codes over 128";  
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
else if($message == "84EN" || $message ==  "84en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 84 - call identity in use.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the network has received a call suspended request containing a call identity (including the null call identity) which is already in use for a suspended call within the domain of interfaces over which the call might be resumed.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "85EN" || $message ==  "85en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 85 - no call suspended.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the network has received a call resume request containing a call identity information element which presently does not indicate any suspended call within the domain of interfaces over which calls may be resumed.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "86N" || $message ==  "86en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 86 - call having the requested call identity has been cleared.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the network has received a call resume request containing a call identity information element indicating a suspended call that has in the meantime been cleared while suspended (either by network time-out or by the remote user).";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "87EN" || $message ==  "87en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 87 - user not a member of CUG.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the called user for the incoming CUG call is not a member of the specified CUG or that the calling user is an ordinary subscriber calling a CUG subscriber.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "88EN" || $message ==  "88en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 88 - incompatible destination.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the equipment sending this cause has received a request to establish a call which has low layer compatibility. high layer compatibility or other compatibility attributes (e.g., data rate) which cannot be accommodated.";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "What it means:\n 1.This usually means that the Number To Dial in the Connection Profile is in the wrong format. You may need to dial a 10 or 11 digit number, or dial a 9 in front of the number if it is a Centrex line.\n 2.This problem may also give a Cause 111.\n 3.Dialing at the wrong line speed can also give this Cause.";   
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "90EN" || $message ==  "90en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 90 - non-existent CUG.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the specified CUG does not exist.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "91EN" || $message ==  "91en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 91 - invalid transit network selection (national use).";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that a transit network identification was received which is of an incorrect format as defined in Annex C/Q.931";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "95EN" || $message ==  "95en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 95 - invalid message, unspecified.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause is used to report an invalid message event only when no other cause in the invalid message class applies.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "96EN" || $message ==  "96en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 96 - mandatory information element is missing.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the equipment sending this cause has received a message which is missing an information element which must be present in the message before that message can be processed.";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "What it means:\n This is rarely seen in North America but usually means that the number that is being dialed is in the wrong format, (similar to cause 88). Some part of the format being used is not understood by either the remote side equipment or the switching equipment between the source and destination of the call.";    
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "97EN" || $message ==  "97en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 97 - message type non-existent or not implemented.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the equipment sending this cause has received a message with a message type it does not recognize either because this is a message not defined of defined but not implemented by the equipment sending this cause.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "98EN" || $message ==  "98en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 98 - message not compatible with call state or message type non-existent.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the equipment sending this cause has received a message such that the procedures do not indicate that this is a permissible message to receive while in the call state, or a STATUS message was received indicating an incompatible call state.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "99EN" || $message ==  "99en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 99 - Information element / parameter non-existent or not implemented.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the equipment sending this cause has received a message which includes information element(s)/parameter(s) not recognized because the information element(s)/parameter name(s) are not defined or are defined but not implemented by the equipment sending the cause. This cause indicates that the information element(s)/parameter(s) were discarded. However, the information element is not required to be present in the message in order for the equipment sending the cause to process the message.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "100EN" || $message ==  "100en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 100 - Invalid information element contents.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the equipment sending this cause has received and information element which it has implemented; however, one or more of the fields in the information element are coded in such a way which has not been implemented by the equipment sending this cause.";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "What it means:\n Like cause 1 and cause 88, this usually indicates that the ISDN number being dialed is in a format that is not understood by the equipment processing the call. SPIDs will sometimes fail to initialize with a Cause 100, or a call will fail with this cause.";    
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "101EN" || $message ==  "101en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 101 - message not compatible with call state.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that a message has been received which is incompatible with the call state.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "102EN" || $message ==  "102en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 102 - recovery on timer expiry.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that a procedure has been initiated by the expiration of a timer in association with error handling procedures.";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "What it means:\n This is seen in situations where ACO (Alternate Call Offering) is being used. With this type of call pre-emption, the Telco switch operates a timer. For example, when an analog call is placed to a Netopia router that has two B Data Channels in place, the router relinquishes the second channel, but if it doesn't happen in the time allotted by the switch programming, the call will not ring through and will be discarded by the switch.";    
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "103EN" || $message ==  "103en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 103 - parameter non-existent or not implemented - passed on (national use).";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the equipment sending this cause has received a message which includes parameters not recognized because the parameters are not defined or are defined but not implemented by the equipment sending this cause. The cause indicates that the parameter(s) were ignored. In addition, if the equipment sending this cause is an intermediate point, then this cause indicates that the parameter(s) were passed unchanged.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "110EN" || $message ==  "110en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 110 - message with unrecognized parameter discarded.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the equipment sending this cause has discarded a received message which includes a parameter that is not recognized.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "111EN" || $message ==  "111en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 111 - protocol error, unspecified.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause is used to report a protocol error event only when no other cause in the protocol error class applies.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "127EN" || $message ==  "127en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. 127 - Intel-working, unspecified.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that an interworking call (usually a call to 5W56 service) has ended.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "128EN" || $message ==  "128en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Notes about Cause Codes over 128";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "Cause code values of 128 and higher aren't sent over the network. A terminal displaying a value 128 or higher and claiming it is a cause code arguably has a bug or is implementing some proprietary diagnostic code (not necessarily bad). Some commendation has cause codes listed with numbers higher than 128, but at this time they are proprietary in nature.\n\nThe PRI equipment vendors are the most likely to use these codes as they have been using proprietary messages in the facilities data link for some time now (there is an as yet undefined area in the FDL which is big enough to carry small datagrams or messages). It is typically used to pass proprietary control or maintenance messages between multiplexers.";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "causeth" || $message == "Causeth" || $message == "num" ||$message == "Numth" || $message == "Helpth" ||$message == "helpth" || $message == "th" || $message == "TH" ){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "1TH – หมายเลขที่ยังไม่ได้จัดสรร (ไม่ได้กำหนด)\n2TH - ไม่มีเส้นทางในการเชื่อมโยงเครือข่ายที่ระบุ (การใช้งานในระดับประเทศ)\n3TH - ไม่มีเส้นทางไปยังปลายทาง\n4TH – ส่งข้อมูลเสียงพิเศษ\n5TH - คำนำหน้าที่ไม่ถูกต้อง (ใช้ในระดับชาติ)\n6TH – ช่องทางไม่รองรับ\n7TH – การโทรถูกจัดส่งในช่องทางที่จัดตั้งขึ้น\n8TH - การยกเว้น\n9TH - การยกเว้น - วงจรที่สงวนไว้เพื่อใช้ซ้ำ\n16TH - การล้างข้อมูลปกติ\n17TH - ผู้ใช้ไม่ว่าง\n18TH - ไม่มีผู้ใช้ตอบสนอง\n19TH - ไม่มีคำตอบจากผู้ใช้ (ผู้ใช้แจ้งเตือน)\n20TH - ไม่มีสมาชิก\n21TH - การโทรถูกปฎิเสธ\n22TH - เปลี่ยนหมายเลข\n26TH - การล้างข้อมูลผู้ใช้ที่ไม่ได้เลือก\n27TH - ปลายทางไม่อยู่ในลำดับ\n28TH - รูปแบบตัวเลขที่ไม่ถูกต้อง (ที่อยู่ไม่สมบูรณ์)\n29TH - บริการเสริมถูกปฎิเสธ\n30TH - การตอบสนองต่อการสอบถามสถานะของข้อความ\n31TH – โดยทั่วไป\n34TH - ไม่มีวงจร / ช่องสัญญาณ\n35TH - รอสาย\n38TH - เครือข่ายไม่อยู่ในระบบ\n39TH - การออกจากบริการการเชื่อมต่อโหมดเฟรมแบบถาวร";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "40TH - การเชื่อมต่อโหมดเฟรมแบบถาวร\n41TH - ความล้มเหลวชั่วคราว\n42TH - การเปลี่ยนความแออัดของอุปกรณ์\n43TH - ข้อมูลการเข้าถึงถูกละทิ้ง\n44TH - ไม่สามารถใช้วงจร / ช่องสัญญาณได้\n46TH - การเรียกข้อมูลสำคัญถูกบล็อก\n47TH - ทรัพยากรไม่พร้อมใช้งานไม่ระบุ\n49TH - คุณภาพของการบริการไม่พร้อมใช้งาน\n50TH - การร้องขอบริการเสริมถูกปฎิเสธ\n52TH – ไม่อนุญาตให้มีการโทรออก\n53TH - การโทรออกที่ถูกระงับภายใน CUG\n54TH - มีสายเรียกเข้าที่ถูกระงับ\n55TH - สายเรียกเข้าที่ถูกระงับภายใน CUG\n57TH - ความสามารถในการรับมอบสิทธิ์ไม่ได้รับอนุญาต\n58TH – ความสามารถของผู้ถือสิทธิ์ไม่สามารถใช้ได้ในปัจจุบัน\n62TH - ไม่สอดคล้องกันในส่วนข้อมูลขาออก\n63TH - บริการหรือตัวเลือกไม่พร้อมใช้งาน ยังไม่ระบุ\n65TH - ไม่สามารถใช้งานได้\n69TH – การร้องขอบริการเสริมไม่สำเร็จ\n70TH -  เฉพาะความสามารถของผู้ถือข้อมูลดิจิทัลที่มีอยู่\n79TH - บริการหรือตัวเลือกไม่ได้ใช้งานที่ไม่ระบุ\n81TH - ค่าอ้างอิงการโทรไม่ถูกต้อง";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "82TH - ช่องที่ระบุไม่มีอยู่\n83TH - มีการระงับการโทรอยู่ แต่การโทรนี้ไม่สามารถระบุได้\n84TH - เรียกใช้ข้อมูลประจำตัว\n85TH - ไม่มีการระงับการโทร\n86TH - การโทรที่มีข้อมูลประจำตัวของสายเรียกเข้าได้ถูกล้างแล้ว\n87TH - ผู้ใช้ไม่ได้เป็นสมาชิกของ CUG\n88TH - ปลายทางที่เข้ากันไม่ได้\n90TH - CUG ที่ไม่มีอยู่จริง\n91TH - การเลือกเครือข่ายสาธารณะที่ไม่ถูกต้อง (ใช้ในระดับประเทศ)\n95TH - ข้อความที่ไม่ถูกต้อง\n96TH - ไม่มีข้อมูลองค์ประกอบที่จำเป็น\n97TH - ประเภทข้อความไม่มีอยู่จริงหรือไม่ได้ใช้งาน\n98TH - ข้อความไม่สามารถใช้ได้กับสถานะการโทรหรือประเภทข้อความที่ไม่มีอยู่จริง\n99TH - องค์ประกอบข้อมูล / ตัวแปรไม่มีอยู่จริงหรือไม่ได้ใช้งาน\n100TH - เนื้อหาขององค์ประกอบข้อมูลไม่ถูกต้อง\n101TH - ข้อความเข้ากันไม่ได้กับสถานะการโทร\n102TH - การกู้คืนเมื่อหมดอายุตัวจับเวลา\n103TH - ตัวแปรที่ไม่มีอยู่จริงหรือไม่ได้ใช้งาน - ดำเนินต่อไป (ใช้งานในระดับประเทศ)\n110TH - ข้อความที่มีตัวแปรที่ไม่รู้จักถูกละทิ้ง\n111TH - โปรโตคอลผิดพลาด\n127TH - การทำงานของ Intel\nสาเหตุรหัสมากกว่า 128TH";    
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "1TH" || $message ==  "1th"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สาเหตุที่1 – หมายเลขที่ยังไม่ได้จัดสรร (ไม่ได้กำหนด)\n\nสาเหตุนี้บ่งชี้ว่าปลายทางที่ร้องขอโดยผู้ใช้โทรศัพท์ไม่สามารถเข้าถึงได้เนื่องจากแม้ว่าหมายเลขจะอยู่ในรูปแบบที่ถูกต้อง แต่ปัจจุบันยังไม่ได้กำหนด (จัดสรร)\n\nสิ่งที่มักจะหมายถึง:\n 1. SPIDS อาจป้อนไม่ถูกต้องในเราเตอร์หรือสวิตช์เทเลคอมทำให้เกิดข้อผิดพลาดใน SPID ในบันทึกของเราเตอร์\n 2. หมายเลขโทรศัพท์ ISDN ที่เราเตอร์เรียกใช้โดยเราเตอร์ไม่ถูกต้องและสวิตช์เทเลคอมไม่สามารถหาหมายเลขให้เสร็จสมบูรณ์ได้เนื่องจากไม่ถูกต้อง\n 3. ในการโทรศัพท์ทางไกลต้นสายไม่สามารถส่งไปยังปลายทางได้อย่างถูกต้อง";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "2TH" || $message ==  "2th"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สาเหตุที่ 2 - ไม่มีเส้นทางในการเชื่อมโยงเครือข่ายที่ระบุ (การใช้งานในระดับประเทศ)\n\nสาเหตุนี้บ่งชี้ว่าอุปกรณ์ส่งได้รับคำขอให้กำหนดเส้นทางการโทรผ่านเครือข่ายการขนส่งเฉพาะที่ไม่รู้จัก อุปกรณ์ที่ส่งไม่รู้จักเครือข่ายการขนส่งเนื่องจากเครือข่ายการขนส่งสาธารณะไม่มีอยู่หรือเนื่องจากเครือข่ายการขนส่งสาธารณะแห่งหนึ่งไม่ให้บริการอุปกรณ์ที่ส่งถึงสาเหตุนี้";
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

<?php
    $accessToken = "LdV9n8B1D81+KyUu3U7tNI+Xu+pDGGvB/kikQUmVh7WfXioccY1j3DlSLPqvF7ZRyqfWtwlrPvH/deA8wxyye8Z96Cx+z1qerbRumV/EqNucZ43xj9DZZJSBo15vBjmhmfixPzbAC2ej1YV5kOm2ZgdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
        if($message == "โหล" || $message ==  "ดีงับ" || $message ==  "สวัสดี" || $message ==  "ัฮัลโหล" || $message ==  "hello" || $message ==  "hi"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "ไรมุง";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "โสดปะ" || $message ==  "มีแฟนยัง" || $message ==  "จีบได้ปะ" || $message ==  "โสดไหม"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "IG : touchchoky แอดมาคุยกันฮับ";
            replyMsg($arrayHeader,$arrayPostData);
    }
else if($message == "มฮสวยปะ" || $message ==  "มฮสวยไหม"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวยมากกกกกกกก";
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

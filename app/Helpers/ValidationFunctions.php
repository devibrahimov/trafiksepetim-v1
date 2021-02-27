<?php
function tcdogrulama($data){

$client = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");
try {
$result = $client->TCKimlikNoDogrula($data);
if ($result->TCKimlikNoDogrulaResult) {
return 'T.C. Kimlik No Doğru';
} else {
return 'T.C. Kimlik No Hatalı';
}
} catch (Exception $e) {
return $e->faultstring;
}
}



function vergisorgula($vkn,$vd){
    $data = [
        'vkn' => $vkn,
        'vd' => $vd
    ];

    $post = curl_post('https://www.my-api.co/vkn.php', $data);
    $decode = json_decode($post, true);

    return      $decode['message'] ;
}



function curl_post($url, $params) {

    $postData = '';
    foreach($params as $k => $v) {
        $postData .= $k . '='.$v.'&';
    }
    rtrim($postData, '&');

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
    ]);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;

}

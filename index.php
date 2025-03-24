<?php

$url = 'https://graph.facebook.com/v22.0/620580841136322/messages';
$token = 'EAAQQk4DPZA2EBOzcIafAPgM0EhLc8PrYW72MZCBbod1wgkxNHEjBvyuFTsk9cTn0n3k88ZBhnCYN3yUUjtrsh4uwZAqFM1uYfn7iYyjlpgeX9pZAVIlPD1q9Hmc5fpbp8WIQmGZA0lJcfZBcJZBLrEVJAiduk7Nt7RWlAUIplkE1ZBLSf2tiMz1TVyBHuehtHGVVjaqM266SFbezBbmf8If6uu3F2Cn4ZD';

$nombre = "Diego";

$data = array(
    "messaging_product" => "whatsapp",
    "recipient_type" => "individual",
    "to" => "el numero de telefono que pusiste en la configuracion de la app",
    "type" => "template",
    "template" => array(
        "name" => "prueba",
        "language" => array(
            "code" => "es_SV"
        ),
        "components" => array(
            array(
                "type" => "body",
                "parameters" => array(
                    array(
                        "type" => "text",
                        "text" => $nombre
                    )
                )
            )
        )
    )
);

$data_string = json_encode($data);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $token,
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);

$result = curl_exec($curl);
curl_close($curl);
echo $result;

?>
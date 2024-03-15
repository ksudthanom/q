<?php
header("location:javascript://history.go(-1)");

$token = $_GET['lineTo'];
echo $token;
$token = "P0IOlLY6KeIPyEMAA5cdvLDsTr6avKBlWXFzn5nutOO" ; // LINE Token
//Message
$mymessage = "สวัสดีค่ะ \n"; //Set new line with '\n'
$mymessage .= "จาก: ห้องตรวจเวชศาสตร์ฟื้นฟู \n";
$mymessage .= "อีก 2 คิวจะเรียกเข้าห้องตรวจค่ะ";
//$imageFile = new CURLFILE('cat.jpg'); // Local Image file Path
$sticker_package_id = '2';  // Package ID sticker
$sticker_id = '34';    // ID sticker
  $data = array (
    'message' => $mymessage,
    'imageFile' => $imageFile,
    'stickerPackageId' => $sticker_package_id,
    'stickerId' => $sticker_id
  );
  $chOne = curl_init();
  curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
  curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt( $chOne, CURLOPT_POST, 1);
  curl_setopt( $chOne, CURLOPT_POSTFIELDS, $data);
  curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
  $headers = array( 'Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$token, );
  curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
  curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec( $chOne );
  //Check error
  if(curl_error($chOne)) { echo 'error:' . curl_error($chOne); }
  else { $result_ = json_decode($result, true);
  echo "status : ".$result_['status']; echo "message : ". $result_['message']; 
  }
  //Close connection
  curl_close( $chOne );

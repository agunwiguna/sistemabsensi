<?php

function gcm($isi,$judul) {

  $msg = array(
    'body' =>$isi ,
    'title'=>$judul,
    'icon' =>'myicon',
    'sound'=>'mySound'
  );

  $fields = array
  (
    'to'  => '/topics/absen',
    'notification' => $msg
  );

  $headers = array(
  'Authorization: key=AAAAomWrEsg:APA91bEsV3OzdFa91WurjTVs0FaRCtLzoE7uQg-dZrHbuXBbEwAOn9-2HXi4LZJ3EHCUdMeSRsYQK4o0sYTRF9VDks0MIXwKgvdIjo324guvp53SdnzI-uAt9TPoMtPOnXsSqAr2V6d1', // FIREBASE_API_KEY_FOR_ANDROID_NOTIFICATION
  'Content-Type: application/json'
  );

  // Open connection
  $ch = curl_init();

  // Set the url, number of POST vars, POST data
  curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
  curl_setopt( $ch,CURLOPT_POST, true );
  curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
  curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
  
  // Disabling SSL Certificate support temporarly
  curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
  curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
  
  // Execute post
  $result = curl_exec($ch );
  if($result === false){
  die('Curl failed:' .curl_errno($ch));
  }
  
  // Close connection
  curl_close( $ch );
  return $result;

}

?>

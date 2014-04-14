<?php

$url='http://api.wolframalpha.com/v2/query?input=yellow%2Bnoodles&appid=866XWU-H52X63V8TV&output=json';

$response = json_decode(get_data($url));
//var_dump ($response);
if(!$response->queryresult->success){
echo 'failed';
}
//var_dump( $response->queryresult->didyoumeans[0]->val);

$test= $response->queryresult->didyoumeans[0]->val;
var_dump($test);
echo $test;
//var_dump( $response->queryresult->success);
function get_data($url) {
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

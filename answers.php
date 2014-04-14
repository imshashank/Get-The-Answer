<?php

$url='http://gravity.answers.com/question/search?keyword=macbook';

$arr= get_data($url);

$obj = json_decode($arr, TRUE);

for($i=0; $i<count($obj['results']); $i++) {
echo var_dump($obj['results'][$i]['question']);
echo $obj['results'][$i]['answer'];
}

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

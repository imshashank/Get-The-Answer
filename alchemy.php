<?php
require_once './alchemyapi_php/alchemyapi.php';
$alchemyapi = new AlchemyAPI();
$myText = "white macbook";


//$response = $alchemyapi->keywords("text", $myText, null);
//var_dump($response);
//echo count($response['keywords']);
//$text= $response['keywords'][0]['text'];
//var_dump($text);
$response = $alchemyapi->entities("text", $myText, null);
//var_dump($response);
$entity= $response['entities'][0]['text'];
echo $entity;
var_dump($entity);
echo 'Entiry is : '.$entity
//if($response['entities != null){
//var_dump( $response->entities);
//}
//$response = $alchemyapi->category("text", $myText, null);
//var_dump($response);
?>

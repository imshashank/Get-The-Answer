<?php
require_once '/var/www/get/vendor/mashape/unirest-php/lib/Unirest.php';
if ($_FILES["file"]["error"] > 0)
  {
//  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
//  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
//  echo "Type: " . $_FILES["file"]["type"] . "<br>";
//  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }
//echo $_FILES["file"]["tmp_name"].'/'.$_FILES["file"]["name"];

$target_path = "uploads/";

$target_path = $target_path . basename( $_FILES['file']['name']); 

if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
  //  echo "The file ".  basename( $_FILES['file']['name']).   " has been uploaded";
} else{
 //   echo "There was an error uploading the file, please try again!";
}

$response = Unirest::post(
  "https://camfind.p.mashape.com/image_requests",
  array(
    "X-Mashape-Authorization" => "lJIrwtSJIeEMchB2NQCvq8S7IBVyQvmG"
  ),
  array(
    "image_request[locale]" => "en_US",
    "image_request[language]" => "en",
    "image_request[image]" => "@/var/www/get/uploads/".$_FILES["file"]["name"]
  )
);

//var_dump($response);
//var_dump($response->body);
//echo "body";
$token = $response->body->token;
//echo "tokens";
sleep(3);
$response = Unirest::get(
  "https://camfind.p.mashape.com/image_responses/".$token,
  array(
    "X-Mashape-Authorization" => "lJIrwtSJIeEMchB2NQCvq8S7IBVyQvmG"
  ),
  null
);

//var_dump($response);
//echo 'status is '.$response->body->status;
$try=1;
while ($response->body->status == 'not completed' && $try <=2){
sleep(2);
$response = Unirest::get(
  "https://camfind.p.mashape.com/image_responses/".$token,
  array(
    "X-Mashape-Authorization" => "lJIrwtSJIeEMchB2NQCvq8S7IBVyQvmG"
  ),
  null
);
}
{
//var_dump($response);
echo "category is " . $response->body->name;
}
?>

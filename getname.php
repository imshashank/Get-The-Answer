$response = Unirest::post(
  "https://camfind.p.mashape.com/image_requests",
  array(
    "X-Mashape-Authorization" => "lJIrwtSJIeEMchB2NQCvq8S7IBVyQvmG"
  ),
  array(
    "image_request[locale]" => "en_US",
    "image_request[language]" => "en",
    "image_request[device_id]" => "<image_request[device_id]>",
    "image_request[latitude]" => "35.8714220766008",
    "image_request[longitude]" => "14.3583203002251",
    "image_request[altitude]" => "27.912109375",
    "focus[x]" => "480",
    "focus[y]" => "640",
    "image_request[image]" => "@/tmp/file.path"
  )
);

var_dump( category);
$category = Unirest::get(
  "https://camfind.p.mashape.com/image_responses/<token>",
  array(
    "X-Mashape-Authorization" => "lJIrwtSJIeEMchB2NQCvq8S7IBVyQvmG"
  ),
  null
);

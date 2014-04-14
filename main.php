<?php
require_once './alchemyapi_php/alchemyapi.php';
include './wa_wrapper/WolframAlphaEngine.php';
//gets image sends to camapp
//gets text
//sends text to alchemy gets category
//based on category, sends to wolfram alpha
//shows the info
require_once '/var/www/get/vendor/mashape/unirest-php/lib/Unirest.php';

if ($_FILES["file"]["error"] > 0)
  {
//  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
//  echo "Type: " . $_FILES["file"]["type"] . "<br>";
//  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }
//echo $_FILES["file"]["tmp_name"].'/'.$_FILES["file"]["name"];
//echo $_FILES['file']['tmp_name'];
$target_path = "uploads/";

$target_path = $target_path . basename( $_FILES['file']['name']); 

if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
//    echo "The file ".  basename( $_FILES['file']['name']).   " has been uploaded";
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

//echo "finding the category </br>";
$text_image =urlencode($response->body->name);
//require_once './alchemyapi_php/alchemyapi.php';
$alchemyapi = new AlchemyAPI();
$myText = $text_image;
$response = $alchemyapi->taxonomy("text", $myText, null);
$keywords =  $alchemyapi->keywords("text", $myText, null);
$keywords = urlencode($keywords['keywords'][0]['text']);
var_dump($keywords);
$text=  $response['taxonomy'][0]['label'];
$text = substr($text, 1);;
$pieces = explode('/', $text);
var_dump( $pieces);

$url='http://gravity.answers.com/question/search?keyword='.$keywords;

$arr= get_data($url);

$obj = json_decode($arr, TRUE);
echo "<ul>";
for($i=0; $i<count($obj['results']); $i++) {
echo "<li>";
echo 'Q: ' .$obj['results'][$i]['question'].' ?</br>';
echo 'A: '.$obj['results'][$i]['answer'].'</br></br>';
echo "</li>";
}

echo "</ul>";
$link = 'http://api.wolframalpha.com/v2/query?input='.$keywords.'&appid=866XWU-H52X63V8TV&output=json';
echo $link;
//print get_data($link);
  $appID ='866XWU-H52X63V8TV';

  // instantiate an engine object with your app id
  $engine = new WolframAlphaEngine( $appID );

  // we will construct a basic query to the api with the input 'pi'
  // only the bare minimum will be used
  $response = $engine->getResults($text_image );

  // getResults will send back a WAResponse object
  // this object has a parsed version of the wolfram alpha response
  // as well as the raw xml ($response->rawXML) 
  
  // we can check if there was an error from the response object
  if ( $response->isError ) {
?>
  <h1>There was an error in the request</h1>
  </body>
  </html>
<?php
    die();
  }
?>

<h1>Results</h1>
<br>

<?php
  // if there are any assumptions, display them 
  if ( count($response->getAssumptions()) > 0 ) {
?>
    <h2>Assumptions:</h2>
    <ul>
<?php
      // assumptions come as a hash of type as key and array of assumptions as value
      foreach ( $response->getAssumptions() as $type => $assumptions ) {
?>
        <li><?php echo $type; ?>:<br>
          <ol>
<?php
          foreach ( $assumptions as $assumption ) {
?>
            <li><?php echo $assumption->name ." ". $assumption->description;?> to change search to this assumption <a href="simpleRequest.php?q=<?php echo urlencode($assumption->input);?>">click here</a></li>
<?php
          }
?>
          </ol>
        </li>
<?php
      }
?>
      
    </ul>
<?php
  }
?>

<hr>

<?php
  // if there are any pods, display them
  if ( count($response->getPods()) > 0 ) {
?>
    <h2>Pods</h2>
    <table border=1 width="80%" align="center">
<?php
    foreach ( $response->getPods() as $pod ) {
?>
      <tr>
        <td>
          <h3><?php echo $pod->attributes['title']; ?></h3>
<?php
        // each pod can contain multiple sub pods but must have at least one
        foreach ( $pod->getSubpods() as $subpod ) {
          // if format is an image, the subpod will contain a WAImage object
?>
          <img src="<?php echo $subpod->image->attributes['src']; ?>">
          <hr>
<?php
        }
?>
          
        </td>
      </tr>
<?php
    }
?>
    </table>
<?php
  }
?>

</body>
</html>

<?php

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

?>

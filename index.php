<?php
    require_once './alchemyapi_php/alchemyapi.php';
    include './wa_wrapper/WolframAlphaEngine.php';
    ?>
<html>
<head>
<title>Get the answer</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />
<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
<script src="js/jquery.min.js"></script>
<script src="js/skel.min.js"></script>
<script src="js/skel-panels.min.js"></script>
<script src="js/init.js"></script>
<noscript>
<link rel="stylesheet" href="css/skel-noscript.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/style-wide.css" />
</noscript>
<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
</head>


<body>

<script type="text/javascript">
function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("file").files[0]);
    
    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
};
</script>

<script>
var x=document.getElementById("demo");
function getLocation()
{
    if (navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
    else{x.innerHTML="Geolocation is not supported by this browser.";}
}

function showPosition(position)
{
    var a =document.getElementById("lat");
    var b =document.getElementById("lon");
    a.value= position.coords.latitude;
    b.value=  position.coords.longitude;
    //x.innerHTML="Latitude: " + position.coords.latitude +  "<br>Longitude:" + position.coords.longitude;
}
</script>

<!-- Header -->
<div id="header" class="skel-panels-fixed">

<div class="top">

<!-- Logo -->
<div id="logo">
<span class="image avatar48"><img src="images/avatar.jpg" alt="" /></span><br>
<h1 id="title">HackIllinois</h1>
<span class="byline">Find out what something is, just take a pic!</span>
</div>

<!-- Nav -->
<nav id="nav">
<!--

Prologue's nav expects links in one of two formats:

1. Hash link (scrolls to a different section within the page)

<li><a href="#foobar" id="foobar-link" class="skel-panels-ignoreHref"><span class="fa fa-whatever-icon-you-want">Foobar</span></a></li>

2. Standard link (sends the user to another page/site)

<li><a href="http://foobar.tld"><span class="fa fa-whatever-icon-you-want">Foobar</span></a></li>

-->
<ul>
<li><a href="#upload" id="top-link" class="skel-panels-ignoreHref"><span class="fa fa-home">Upload an Image</span></a></li>

<li><a href="#about" id="about-link" class="skel-panels-ignoreHref"><span class="fa fa-envelope">What is it?</span></a></li>


<li><a href="#details" id="contact-link" class="skel-panels-ignoreHref"><span class="fa fa-envelope">Details</span></a></li>

<li><a href="#question" id="contact-link" class="skel-panels-ignoreHref"><span class="fa fa-envelope">Questions Asked</span></a></li>

<li><a href="#us" id="contact-link" class="skel-panels-ignoreHref"><span class="fa fa-user">About Us</span></a></li>


</ul>
</nav>

</div>

<div class="bottom">






<!-- Social Icons -->
<ul class="icons">
<li><a href="#" class="fa fa-twitter solo"><span>Twitter</span></a></li>
<li><a href="#" class="fa fa-facebook solo"><span>Facebook</span></a></li>
<li><a href="#" class="fa fa-github solo"><span>Github</span></a></li>
<li><a href="#" class="fa fa-dribbble solo"><span>Dribbble</span></a></li>
<li><a href="#" class="fa fa-envelope solo"><span>Email</span></a></li>
</ul>

</div>

</div>

<!-- Main -->
<div id="main">



<!-- Upload Image -->
<section id="upload" class="one">
<div class="container">


<header >
<!-- used to upload the file -->
<!-- <img src="images/pic01.jpg" style= "max-width:100%; max-height:100%;"/></a> -->
<br><br>
<h2><?if($_FILES["file"] == null) echo "Don't know what something is? Just upload it's image!"; else echo 'Processing done, check the results';?></h2>
</header>
<?php if(isset($_POST['fname']) && $_POST['fname'] != 'havefun' ) echo 'Wrong API Key';?>
<p><?php if($_FILES["file"] == null) echo "Upload the image to find details about what the object is, and what others ask about the object. Click the upload file below, choose an image, and hit submit.";?></p>

<center>
<div><img id="uploadPreview" <?php if($_FILES["file"]!= null)echo 'src="/get/uploads/'.$_FILES["file"]["name"].'";';?> style= "max-width:100%; max-height:100%;" /></div>
</center>
<form method="post" action="<?php echo $PHP_SELF;?>" enctype="multipart/form-data">


<div class="row">
<div class="12u">
<center>

<input type="file"  name="file" onchange="PreviewImage();"  id="file" />
API Key:<input type="text" name="fname"><br>
<input type="submit" value="submit" name="submit">

</center>
</div>
</div>

<!-- we were trying to get the location to improve object recognition, but did not use this
LATITUDE: <input type="text" name="lat" id="lat" disabled>
<p></p>
LONGITUDE: <input type="text" name="lon" id="lon" disabled >
<p></p>
<input type="button" name="aa" onclick="getLocation()" value="get location">
<p></p>
-->

</form>

</div>
</section>

<?
//gets image sends to camapp
//gets text
//sends text to alchemy gets category
//based on category, sends to wolfram alpha
//shows the info
require_once '/var/www/get/vendor/mashape/unirest-php/lib/Unirest.php';
if (isset($_POST['upload'])) {
    // cURL call would go here
    // my tmp. file would be $_FILES['image']['tmp_name'], and
    // the filename would be $_FILES['image']['name']
}
if ($_FILES["file"]!= null && isset($_POST['fname'])){
    if ($_POST['fname']=='havefun'){
        $flag = true;
    }
}
//debug code
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
//echo $_FILES['file']['tmp_name'];
$target_path = "uploads/";
if ($flag){
    $target_path = $target_path . basename( $_FILES['file']['name']);
    
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
        //    echo "The file ".  basename( $_FILES['file']['name']).   " has been uploaded";
    } else{
        //   echo "There was an error uploading the file, please try again!";
    }
    
    $response = Unirest::post(
                              "https://camfind.p.mashape.com/image_requests",
                              array(
                                    "X-Mashape-Authorization" => "replace with mashape camfindapp key"
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
                                   "X-Mashape-Authorization" => "replace with mashape camfindapp key"
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
                                       "X-Mashape-Authorization" => "replace with mashape camfindapp key"
                                       ),
                                 null
                                 );
    }
}

?>

<!-- About -->
<section id="about" class="two" style="display:<?php if($flag){ echo 'block;"';}else echo 'none;"';?>">
<div class="container">

<header>
<h2 class="alt">What is it?</h2>

<div>
<?php //var_dump($response);
    echo "We think the object in the image is <u><h3> " . $response->body->name.'</h3></u>';
    ?></div>
</header>


</div>
</section>



<!-- About Me -->
<section id="details" class="three" style="display:<?php if($flag){ echo block;}else echo none;?>">
<div class="container">

<header>
<h2>Related categories about this object.</h2>
</header>



<p>Tags:
<?php
    //alchemy API code
    //getting categories
    if($flag) {
        $myText=$response->body->name;
        $text_image =urlencode($response->body->name);
        //require_once './alchemyapi_php/alchemyapi.php';
        $alchemyapi = new AlchemyAPI();
        //echo $myText;
        $response = $alchemyapi->taxonomy("text", $myText, null);
        //var_dump($response);
        $text=  $response['taxonomy'][0]['label'];
        $text = substr($text, 1);;
        
        $pieces = explode('/', $text);
        $count = count($pieces);
        for($i=0;$i<$count;$i++){
            echo $pieces[$i].', ';
        }
        //getting entities from the keywords
        $response = $alchemyapi->entities("text", $myText, null);
        //var_dump($response);
        $entity= $response['entities'][0]['text'];
        $keywords =  $alchemyapi->keywords("text", $myText, null);
        if($entity!= null){
            $wolfram_query = $entity;
            echo $wolfram_query;
        }else {
            
            //separating the noun and adjectives if we couldn't get an entity in the previous result
            $wolfram_query= $keywords['keywords'][0]['text'];
            $wolfram_query=preg_replace("/ /","+",$wolfram_query);
        }
        $keywords = urlencode($keywords['keywords'][0]['text']);
        //var_dump($keywords);
        //var_dump( $pieces);
    }?></p>

</div>
</section>

<!-- About Me -->
<section id="question" class="four" style="display:<?php if($flag){ echo 'block;';}else echo 'none;';?>">
<div class="container">

<header>
<h2>Most commonly asked questions about this object.</h2>
</header>
<?php
    
    //passing the keywords to answers.com API
    if($flag){
        //var_dump($keywords);
        $url='http://gravity.answers.com/question/search?keyword='.$keywords;
        //echo $url;
        $arr= get_data($url);
        
        $obj = json_decode($arr, TRUE);
        echo "<ul>";
        for($i=0; $i<count($obj['results']); $i++) {
            echo "<li>";
            echo '<h3>Q: ' .$obj['results'][$i]['question'].' ?</h3></br>';
            echo 'A: '.strip_tags($obj['results'][$i]['answer']).'</br></br>';
            echo "</li>";
        }
        
        echo "</ul>";
    }?>




</div>
</section>

<section id="wolfram" class="four" style="display:<?php if($flag){ echo 'block;';}else echo 'none;';?>">
<div class="container">

<header>
<h2>Some more facts about the object in the image</h2>
</header>
<?php
    if($flag){
        //some keyword cleaning. Example: Removing white if keyword if "white macbook pro"
        $wolfram_query =str_replace("Red","",$wolfram_query);
        $wolfram_query =str_replace("Yellow","",$wolfram_query);
        $wolfram_query =str_replace("Green","",$wolfram_query);
        $wolfram_query =str_replace("Purple","",$wolfram_query);
        $wolfram_query =str_replace("Pink","",$wolfram_query);
        $wolfram_query =str_replace("Brown","",$wolfram_query);
        $wolfram_query =str_replace("Black","",$wolfram_query);
        $wolfram_query =str_replace("Grey","",$wolfram_query);
        $wolfram_query =str_replace("White","",$wolfram_query);
        
        $link = 'http://api.wolframalpha.com/v2/query?input='.$wolfram_query.'&appid=repalcew_with_wolfram_App_ID&output=json';
        //echo "The link: ".$link."</br>";
        $response = json_decode(get_data($link));
        if (!$response->queryresult->success && $response->queryresult->didyoumeans[0]->score > 0.45){
            
            $wolfram_query= $response->queryresult->didyoumeans[0]->val;
            //var_dump($response->queryresult->didyoumeans);
            $link = 'http://api.wolframalpha.com/v2/query?input='.$wolfram_query.'&appid=repalcew_with_wolfram_App_ID&output=json';
            //echo $link;
            $response = json_decode(get_data($link));
            
        }
        var_dump($response->queryresult->success);
        if ($response->queryresult->success){
            $appID ='repalcew_with_wolfram_App_ID';
            
            // instantiate an engine object with your app id
            $engine = new WolframAlphaEngine( $appID );
            
            // we will construct a basic query to the api with the input 'pi'
            // only the bare minimum will be used
            $response = $engine->getResults($wolfram_query );
            
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
    /* if ( count($response->getAssumptions()) > 0 ) {
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
    */
    ?>

<hr>

<?php
    // if there are any pods, display them
    if ( count($response->getPods()) > 0 ) {
    ?>
<h2>Details</h2>
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
    }}
    ?>

<?php
    //simple curl to read data
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

</div>
</section>


<!-- About Me -->
<section id="us" class="five">
<div class="container">

<header>
<h2>About Us</h2>
</header>



<p>We are a team of three students from The Ohio State University studying Computer Science and Engineering. Our names are Shashank Agarwal, Amna Khan, and Nimit Goyal. Shashank is a first year graduate student, Amna is a senior undergraduate student, and Nimit is a first year graduate student as well.</p>
<p>To Contact Us: <br>

Shashank Agarwal: agarwal.202@osu.edu<br>
Amna Khan: khan.261@osu.edu <br>
Nimit Goyal: goyal.71@osu.edu <br>

</div>
</section>



</div>



</body>
</html>

Get The Answer
By 
Shashank Agarwal
Nimit Goyal

Get the answer is an advance object recognition app. 
Just point your camera to any object and the app tells you 
  What the object is
  Which category it belongs to
  What others ask about it
  More info (nutrients, stocks etc.) from wolfram Alpha
  
APIs uses:
camfind App
Alchemy API
ANswers.com
Wolfram ALpha

Installation:

Get the following API keys:
ALchemy API
Mashape CamFindApp
Wolfram Alpha

Install the alchemy API, camfindapp and Wolfram Alpha for PHP. See their websites for installation instructions.

Edit the file index.php and add the api keys from mashape & wolfram.
Answers.com API that I used had no API, but that API no longer works so try getting a new API from their site.

Add alchemy API to file alchemy_api.txt in root folder.

Then just open index.php in a browser.
Each uploaded image is saved in “uploads” folder.

How it works:
Each image is sent to camfindapp for object recognition.

The results are then parsed using Alchemy API to get the taxonomy (categorization).
Also I used Alchemy to get the “key concept” and separate nouns from adjectives.

The nouns are then passed on to Answers.com to get the most relevant questions and answers.

The noun and categories are also used to get data from wolfram alpha.

Help:

If you need any help just mail me at agarwal.202[at]osu.edu




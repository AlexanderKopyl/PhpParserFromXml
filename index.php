<?php
include 'vendor/autoload.php';
$xml = file_get_contents('sitemap.xml');

preg_match_all("/(http|ftp|https):\/\/([\w_-]+(?:(?:\.[\w_-]+)+))([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])?/",$xml,$matches);
$file = file_get_contents('https://www.ferplast.com/ru/sobaki.html'); // see below for source

// loads the file
// basically think of your php script as a regular HTML page running client side with jQuery.  This loads whatever file you want to be the current page
phpQuery::newDocumentFileHTML($file);

// Once the page is loaded, you can then make queries on whatever DOM is loaded.
// This example grabs the title of the currently loaded page.
$titleElement = pq('h1'); // in jQuery, this would return a jQuery object.  I'm guessing something similar is happening here with pq.

// You can then use any of the functionality available to that pq object.  Such as getting the innerHTML like I do here.
$title = $titleElement->html();

var_dump($title);
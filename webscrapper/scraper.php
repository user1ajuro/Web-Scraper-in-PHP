<?php
// This Web Scrapper is demonstrated to extract Top 10 trending video from youtube
#Sylvester
require('simple_html_dom.php');

$html = file_get_html('https://www.youtube.com/feed/trending');

$videos = [];

// Find top ten videos
$i = 1;
foreach ($html->find('li.expanded-shelf-content-item-wrapper') as $video) {
        if ($i > 10) {
                break;
        }

        // Find item link element
        $videoDetails = $video->find('a.yt-uix-tile-link', 0);

        // get title attribute
        $videoTitle = $videoDetails->title;

        // get href attribute
        $videoUrl = 'https://youtube.com' . $videoDetails->href;

        // push to a list of videos
        $videos[] = [
                'title' => $videoTitle,
                'url' => $videoUrl
        ];

        $i++;
}
/*to print Array
echo "<pre>";
$d = print_r ($videos); 
*
*
to print as object
echo "<pre>";
var_dump($videos);
*
*To print json
echo "<pre>";
$user_json = json_encode($videos);
echo $user_json;
 */       


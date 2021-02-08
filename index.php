<?php
require_once __DIR__.'/lib/lib_youtube.php';

$api_key = 'AIzaSyCTgNyxcUXlKmrFdPWiI5lrGyE6fWPxDi4';

$youtube = new YoutubeData($api_key);

$channel_id = 'UCutJqz56653xV2wwSvut_hQ';

$videos = $youtube->get_videoData($channel_id, 2);

//取得した動画のサムネを表示してみる
foreach ($videos as $video) {
    echo '<img src="' . $video['snippet']['thumbnails']['high']['url']. '" />';
}
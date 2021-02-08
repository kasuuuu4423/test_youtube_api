<?php
require_once __DIR__.'/../src/google-api-php-client-2.3.0/vendor/autoload.php';

class YoutubeData{
  private $client;
  function __construct($api_key){
    $this->client = $this->get_client($api_key);
  }
  
  private function get_client($api_key){
      $client = new Google_Client();
      $client->setApplicationName("youtube-api-test");
      $client->setDeveloperKey($api_key);
      return $client;
  }

  public function get_videoData($channel_id, $num){
    $youtube = new Google_Service_YouTube($this->client);
    //ここに好きなYouTubeのチャンネルIDを入れる
    $params['channelId'] = $channel_id;
    $params['type'] = 'video';
    $params['maxResults'] = $num;
    $params['order'] = 'date';
    try {
        $searchResponse = $youtube->search->listSearch('snippet', $params);
    } catch (Google_Service_Exception $e) {
        echo htmlspecialchars($e->getMessage());
        exit;
    } catch (Google_Exception $e) {
        echo htmlspecialchars($e->getMessage());
        exit;
    }
    foreach ($searchResponse['items'] as $search_result) {
        $videos[] = $search_result;
    }
    return $videos;
  }
}

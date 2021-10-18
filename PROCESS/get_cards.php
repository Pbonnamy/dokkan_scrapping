<?php
//set_time_limit(0);

require_once('../vendor/autoload.php');
require_once('UTILS/get_data.php');

use Goutte\Client;

$client = new Client();

$crawler = $client->request('GET', 'https://www.dokkanbattleoptimizer.com/');

$cards = get_card_info($crawler);
$cardImg = get_card_img($crawler);
$categories = get_category($crawler);
$links = get_link($crawler);

for ($i=0; $i < count($cards); $i++) {

  $cards[$i]['img'] = $cardImg[$i];

  for ($j=0; $j < count($cards[$i]['categories']); $j++) {
    $cards[$i]['categories'][$j] = $categories[($cards[$i]['categories'][$j])];
  }

  for ($j=0; $j < count($cards[$i]['links']); $j++) {
    $cards[$i]['links'][$j] = $links[($cards[$i]['links'][$j])];
  }
}

echo json_encode($cards);
?>

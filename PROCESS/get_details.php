<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../vendor/autoload.php');
require_once('UTILS/get_data.php');

use Goutte\Client;

$client = new Client();

$crawler = $client->request('GET', 'https://dbz.space/cards/'.$_POST['id']);

$card = get_card_detail($crawler);

$result = array_merge(json_decode($_POST['card'],true),$card);


if($_POST['count']!= 0){
  file_put_contents('../RESULT/result.json', ','.PHP_EOL.htmlspecialchars_decode(json_encode( $result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES )), FILE_APPEND | LOCK_EX);
}else{
  if(file_exists('../RESULT/result.json')){
    rename('../RESULT/result.json','../RESULT/'.date('Y-m-d _-_ H;i;s').'.json');
  }
  file_put_contents('../RESULT/result.json', htmlspecialchars_decode(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)), FILE_APPEND | LOCK_EX);
}

echo json_encode($result);

 ?>

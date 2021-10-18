<?php
function get_category($crawler){
  $category = [];

  $category = $crawler->filter('#filters [data-category] option')->each(function ($node) {
      if($node->attr('value')){
        return array($node->attr('value') => $node->text());
      }
  });

  $category = array_values(array_filter($category));

  $final = [];

  for ($i=0; $i < count($category); $i++) {
    foreach ($category[$i] as $key => $value) {
      $final[$key]= $value;
    }
  }

  return $final;
}

function get_link($crawler){
  $link = [];

  $link = $crawler->filter('#filters [data-link] option')->each(function ($node) {
      if($node->attr('value')){
        return array($node->attr('value') => $node->text() . ' [' . $node->attr('data-skill-description') . ']');
      }
  });

  $link = array_values(array_filter($link));

  $final = [];

  for ($i=0; $i < count($link); $i++) {
    foreach ($link[$i] as $key => $value) {
      $final[$key]= $value;
    }
  }

  return $final;
}

function get_card_img($crawler){
  $img = [];

  $img = $crawler->filter('.character img')->each(function ($node) {
      if ($node->attr('src')) {
        return $node->attr('src');
      }
  });

  return $img;
}

function get_card_info($crawler){
  $info = [];

  $info = $crawler->filter('.character')->each(function ($node) {
      if($node->attr('data-name')){
        $categories = array_values(array_filter(explode('-', str_replace(str_split('[]'), '-', $node->attr('data-categories')))));
        $links = array_values(array_filter(explode('-', str_replace(str_split('[]'), '-', $node->attr('data-links')))));
        return array('id' => ($node->attr('data-id')+1), 'name' => $node->attr('data-name'), 'rarity' => $node->attr('data-rarity'), 'class' => $node->attr('data-class'), 'type' => $node->attr('data-type'),
        'categories' => $categories, 'links' => $links);
      }
  });

  return array_filter($info);
}

function get_card_detail($crawler){
  $detail= [];

  $detail['subtitle'] = $crawler->filter('.title h2')->text();

  $detail['cost'] = $crawler->filter('.cost')->text();

  $detail['leader'] = $crawler->filter('.leader')->text();

  $super = explode('$', str_replace(str_split('<>'), '$', $crawler->filter('.special')->html()));
  $detail['super'] = $super[6];

  $detail['passive'] = $crawler->filter('.passive')->text();

  $hp = explode(',',$crawler->filter('.stat')->eq(0)->attr('data'));

  $detail['HP'] = array('base' => $hp[count($hp)-2], 'max' => $hp[count($hp)-1]);

  $atk = explode(',',$crawler->filter('.stat')->eq(1)->attr('data'));

  $detail['ATK'] = array('base' => $atk[count($atk)-2], 'max' => $atk[count($atk)-1]);

  $def = explode(',',$crawler->filter('.stat')->eq(2)->attr('data'));

  $detail['DEF'] = array('base' => $def[count($def)-2], 'max' => $def[count($def)-1]);

  return $detail;
}


 ?>

<?php
define("PARTS_DIR", __DIR__ . '/parts/');

function part(string $part_name, array $variables = []) {
  extract($variables);
  include(PARTS_DIR . $part_name . '.php');
}

function storeError(string $error_msg) {
  file_put_contents(__DIR__ . '/error.log', date('d.m.Y. H:i:s') . ' ' . $error_msg . PHP_EOL, FILE_APPEND);
}

function getLang() {
  $lang = 'lv';

  if (isset($_GET['lang']) && is_string($_GET['lang'])) {
    if ($_GET['lang'] == 'ru') {
      $lang = 'ru';
    }
    else if ($_GET['lang'] == 'en') {
      $lang = 'en';
    }
  }

  return $lang;
}

function getTranslationStrings($lang) {
  $file_name = PRIVATE_DIR . 'lang/' . $lang . '.json';

  if (file_exists($file_name)) {
    return json_decode(file_get_contents($file_name), true);
  }

  return [];
}

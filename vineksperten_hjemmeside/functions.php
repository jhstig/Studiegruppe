<?php

function getJson($path) {
  $json = file_get_contents($path);
  return json_decode($json, true);
}

function debug($var) {
  echo '<pre>';
  print_r($var);
  echo '</pre>';
}
?>

<?php
$json = file_get_contents(CORE . "config.json");
$config_json = json_decode($json, TRUE);
$config = array();
foreach ($config_json as $key => $value) {
  $config[$key] = $value;
}
$GLOBALS['config'] = $config;
?>

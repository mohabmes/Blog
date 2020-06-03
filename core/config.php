<?php
$json = file_get_contents(CORE . "config.json");
$config_json = json_decode($json, True);
$GLOBALS['config'] = $config_json;
?>

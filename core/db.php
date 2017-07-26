<?php

$config = $GLOBALS['config']['mysql'];
try{
  $db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['db'] ,
    $config['username']);

} catch(Exception $e){
  echo error('DB Error: ' . $e->getMessage() );
}

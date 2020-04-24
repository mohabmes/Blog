<?php
$dbconfig = $GLOBALS['config']['database'];
try{
  $db = new PDO('mysql:host=' . $dbconfig['host'] . ';dbname=' . $dbconfig['db'] ,
    $dbconfig['username']);

} catch(Exception $e){
  echo error('DB Error: ' . $e->getMessage() );
}

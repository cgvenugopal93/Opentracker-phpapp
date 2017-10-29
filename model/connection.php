<?php

$host='localhost';
//username
$user='loremipsum';
//password
$pass='loremipsum';
$dbname='loremipsum';
$link=mysql_connect($host,$user,$pass);
if(!mysql_select_db($dbname)) die ('Could not connect to database');
	
?>
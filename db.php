<?php
$dbhost = 'localhost:3307';
$dbuser = 'Arif';
$dbpass = '123456';
$database = 'MOVIES';

$db = mysqli_connect($dbhost,$dbuser,$dbpass,$database);


if(! $db){
    die('Could not connect: '.mysqli_connect_error());
}

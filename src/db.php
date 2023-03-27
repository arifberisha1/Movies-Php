<?php
$dbhost = 'localhost:3307';
// Fill with your credentials
$dbuser = '';
$dbpass = '';
$database = 'MOVIES';

$db = mysqli_connect($dbhost,$dbuser,$dbpass,$database);


if(! $db){
    die('Could not connect: '.mysqli_connect_error());
}

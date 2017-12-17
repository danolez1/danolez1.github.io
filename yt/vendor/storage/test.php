<?php
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Request-Method: POST, GET, OPTIONS");
header("Access-Control-Request-Headers: *");
header('P3P: CP="CAO PSA OUR"'); 


$myfile = fopen("ytdb.txt", "r");
$file = fread($myfile,filesize("ytdb.txt"));
$visited = json_decode($file)->visited;
$downloaded = json_decode($file)->downloaded;

if(isset($_GET["visit"])){
$myfile = fopen("ytdb.txt", "w");
$var = array('visited' => $visited+1, 'downloaded'=>$downloaded);
fwrite($myfile, json_encode($var));
}

if(isset($_GET["download"])){
$myfile = fopen("ytdb.txt", "w");
$var = array('visited' => $visited, 'downloaded'=>$downloaded+1);
fwrite($myfile, json_encode($var));
}

$myfile = fopen("ytdb.txt", "r");
$file = fread($myfile,filesize("ytdb.txt"));

echo $file;

fclose($myfile);
?>
<?php
session_start();

//include all functions
require ('../private_html/private_a/includes/functions.php');


$page = isset($_GET['url']) ? $_GET['url'] : "admin";

//includes folder
$folder = "../private_html/private_a/includes/";

//get all files from folder
$files = glob($folder . "*.php");
$file_name = $folder . $page . ".php";

if(in_array($file_name, $files))
{
	include($file_name);
}
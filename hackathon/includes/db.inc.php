<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "hackathon";

$conn = mysqli_connect("localhost", "root", "", "hackathon");
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
<?php
$servername = "localhost";
$username = "u984411321_admin";
$password = "Em.27602343";
$db = "u984411321_actualizada";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error)  {
  die("Connection failed: " . $conn->connect_error);
}

<?php
$conn = new mysqli("localhost","span_diagno","y4K27CQJt","span_diagno");

// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
?>
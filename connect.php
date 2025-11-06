<?php
$conn = new mysqli("localhost", "root", "", "allrecords");

if ($conn) {
   
    echo "connected successfully";
}
else{
    echo "you are not connected";
}
?>

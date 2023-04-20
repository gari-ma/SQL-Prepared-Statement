<?php

$rating = $_GET["rating"];

// connection
$conn = new mysqli("localhost","root","","logindb");

if(!$conn) {
    // err block
    die("Could not connect");
}

// read operation
$sql = "SELECT * FROM movies WHERE rating >= $rating";
echo $sql."<br>";
$result = $conn->query($sql);  // associate array

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row['name']."<br>";
    }
}
else {
    echo "No any movies found";
}



?>
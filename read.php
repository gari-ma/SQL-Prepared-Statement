<?php


// connection
$conn = new mysqli("localhost","root","","logindb");

if(!$conn) {
    // err block
    die("Could not connect");
}

// read operation
$sql = "SELECT * FROM movies WHERE rating >= ?";
$statement = $conn->prepare($sql);
$statement->bind_param("i",$rating);
$rating = $_GET["rating"];
$statement->execute();

$result = $statement->get_result();  // associate array

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row['name']."<br>";
    }
}
else {
    echo "No any movies found";
}



?>
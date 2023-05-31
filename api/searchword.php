<?php

include_once "../db.php";

header("Content-Type: application/json");

// Check the connection
if ($conn->connect_error) {
    die(json_encode(array('error' => $conn->connect_error)));
}

// Get the search query from the URL parameters
$query = isset($_GET['q']) ? $_GET['q'] : '';

// Run a query against the database
$result = $conn->query("SELECT `category` FROM `categories` WHERE `category` LIKE '%$query%'");

// Check the result
if ($result === FALSE) {
    die(json_encode(array('error' => $conn->error)));
}

// Fetch all the rows as an array
$data = $result->fetch_all(MYSQLI_ASSOC);

// Send the data as JSON
echo json_encode($data);

// Close the connection
$conn->close();
?>
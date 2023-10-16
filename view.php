<?php
include 'connect.php';

$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);

$jobs = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jobs[] = $row;
    }
}

echo json_encode($jobs);

$conn->close();
?>

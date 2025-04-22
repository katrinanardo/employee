<?php
include 'db.php';

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

$employees = [];
while($row = $result->fetch_assoc()) {
    $employees[] = $row;
}

echo json_encode($employees);
?>

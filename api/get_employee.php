<?php
include 'db.php';

$emp_code = $_GET['emp_code'];
$sql = "SELECT * FROM employees WHERE emp_code = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $emp_code);
$stmt->execute();

$result = $stmt->get_result();
$employee = $result->fetch_assoc();

echo json_encode($employee);

$stmt->close();
$conn->close();
?>

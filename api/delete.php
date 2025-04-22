<?php
include 'db.php'; 

$emp_code = $_POST['emp_code'];

$sql = "DELETE FROM employees WHERE emp_code = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $emp_code);  

if ($stmt->execute()) {
    echo "Employee deleted successfully!";
} else {
    http_response_code(500); 
    echo "Failed to delete employee: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

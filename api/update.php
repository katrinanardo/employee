<?php
include 'db.php';

$emp_code   = $_POST['emp_code'];    
$lastname   = $_POST['lastname'];
$firstname  = $_POST['firstname'];
$birthday   = $_POST['birthday'];
$sex        = $_POST['sex'];
$address    = $_POST['address'];
$original_emp_code = $_POST['original_emp_code']; 

$sql = "UPDATE employees SET 
  emp_code = ?, 
  lastname = ?, 
  firstname = ?, 
  birthday = ?, 
  sex = ?, 
  address = ?
WHERE emp_code = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $emp_code, $lastname, $firstname, $birthday, $sex, $address, $original_emp_code);

if ($stmt->execute()) {
    echo "Updated";
} else {
    http_response_code(500);
    echo "Failed to update: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

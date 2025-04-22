<?php
include 'db.php';

$emp_code = $_POST['emp_code'];
$lastname     = $_POST['lastname'];
$firstname    = $_POST['firstname'];
$birthday      = $_POST['birthday'];
$sex           = $_POST['sex'];
$address       = $_POST['address'];

$sql = "INSERT INTO employees (emp_code, lastname, firstname, birthday, sex, address) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $emp_code, $lastname, $firstname, $birthday, $sex, $address);

if ($stmt->execute()) {
    echo "Success";
} else {
    http_response_code(500);
    echo "Failed to add employee";
}

$stmt->close();
$conn->close();
?>

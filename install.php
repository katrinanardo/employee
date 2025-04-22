<?php
$conn = new mysqli('localhost', 'root', '', '');

$conn->query("CREATE DATABASE IF NOT EXISTS employee_db");

$conn->select_db('employee_db');

$conn->query("CREATE TABLE IF NOT EXISTS employees (...)");

echo "Setup complete.";
$conn->close();
?>
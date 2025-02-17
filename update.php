<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $sql = "UPDATE contacts SET name='$name', lastName='$lastName', phone='$phone' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    die("Invalid request.");
}
?>
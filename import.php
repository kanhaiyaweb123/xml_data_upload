<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['xml_file'])) {
    $xml = simplexml_load_file($_FILES['xml_file']['tmp_name']);
    foreach ($xml->contact as $contact) {
        $name = $conn->real_escape_string($contact->name);
        $lastName = $conn->real_escape_string($contact->lastName);
        $phone = $conn->real_escape_string($contact->phone);
        $conn->query("INSERT INTO contacts (name, lastName, phone) VALUES ('$name', '$lastName', '$phone')");
    }
    header("Location: index.php");
}
?>
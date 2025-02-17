<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM contacts WHERE id = $id");
    $contact = $result->fetch_assoc();

    if (!$contact) {
        die("Contact not found.");
    }
} else {
    die("Invalid request.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Contact</title>
</head>
<body>
    <h1>Edit Contact</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $contact['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $contact['name']; ?>" required>
        <br>
        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" id="lastName" value="<?php echo $contact['lastName']; ?>" required>
        <br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="<?php echo $contact['phone']; ?>" required>
        <br>
        <button type="submit">Update Contact</button>
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
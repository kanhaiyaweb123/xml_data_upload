<?php
include 'db.php';

// Fetch contacts
$result = $conn->query("SELECT * FROM contacts");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contacts</title>
</head>
<body>
    <h1>Contacts</h1>
    <form action="import.php" method="post" enctype="multipart/form-data">
        <input type="file" name="xml_file" accept=".xml" required>
        <button type="submit">Import Contacts</button>
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['lastName']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
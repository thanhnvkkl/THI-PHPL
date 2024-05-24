<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "phonebook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Contacts</h2>";
    echo "<table>";
    echo "<tr><th>Name</th><th>Phone Number</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["phone_name"] . "</td><td>" . $row["phone_number"] . "</td>";
        echo "<td><a href='edit_contact.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete_contact.php?id=" . $row["id"] . "'>Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "No contacts found.";
}

$conn->close();

?>

<br>
<a href="add_contact.php">Add New Contact</a>
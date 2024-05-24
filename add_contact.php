<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "phonebook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone_number = $_POST["phone_number"];

    $sql = "INSERT INTO contacts (name, phone_number) VALUES ('$name', '$phone_number')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>

<h2>Add New Contact</h2>
<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="phone_number">Phone Number:</label>
    <input type="text" id="phone_number" name="phone_number" required><br><br>
    <input type="submit" value="Add">
</form>
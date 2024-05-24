<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "phonebook";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET["id"];

$sql = "SELECT * FROM contacts WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row["phone_name"];
    $phone_number = $row["phone_number"];
} else {
    echo "Contact not found.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updated_name = $_POST["name"];
    $updated_phone_number = $_POST["phone_number"];

    $sql = "UPDATE contacts SET name='$updated_name', phone_number='$updated_phone_number' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Contact updated successfully";
    } else {
        echo "Error updating contact: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>

<h2>Edit Contact</h2>
<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>
    <label for="phone_number">Phone Number:</label>
    <input type="text" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>" required><br><br>
    <input type="submit" value="Save">
</form>
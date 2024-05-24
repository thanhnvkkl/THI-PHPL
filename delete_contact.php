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

if (isset($_GET["confirm"])) {
    $sql = "DELETE FROM contacts WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Contact deleted successfully";
    } else {
        echo "Error deleting contact: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Are you sure you want to delete this contact?<br>";
    echo "<a href='" . $_SERVER['PHP_SELF'] . "?id=" . $id . "&confirm=1'>Yes</a> | <a href='index.php'>No</a>";
}

$conn->close();

?>
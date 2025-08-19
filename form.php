<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "simple_form");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $father_name = $_POST['father_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $sql = "INSERT INTO users (name, father_name, email, contact, address) 
            VALUES ('$name', '$father_name', '$email', '$contact', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Data saved successfully! <a href='form.html'>Go Back</a>";
    } else {
        echo "❌ Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "⚠️ Please submit the form first!";
}
?>
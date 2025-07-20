<!DOCTYPE html>
<html>
<head>
    <title>User Form</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 5px; }
        .btn-toggle { cursor: pointer; background-color: #eee; padding: 4px 8px; border: 1px solid #aaa; }
    </style>
</head>
<body>

<form method="POST" action="">
    <input type="text" name="name" placeholder="Name" required>
    <input type="number" name="age" placeholder="Age" required>
    <input type="submit" name="submit" value="Add User">
</form>

<?php
// MySQL connection
$conn = new mysqli("localhost", "root", "", "info");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert submitted data
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $conn->query("INSERT INTO user (name, age, status) VALUES ('$name', '$age', 0)");
}

// Toggle status if requested via GET
if (isset($_GET['toggle_id'])) {
    $id = $_GET['toggle_id'];
    $current = $_GET['current'];
    $new_status = $current == 1 ? 0 : 1;
    $conn->query("UPDATE user SET status = $new_status WHERE id = $id");
    header("Location: index.php"); // refresh without query string
    exit();
}

// Display table of users
$result = $conn->query("SELECT * FROM user");
if ($result->num_rows > 0) {
    echo "<h3>All Users</h3><table><tr><th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td>{$row['status']}</td>
                <td>
                    <a class='btn-toggle' href='?toggle_id={$row['id']}&current={$row['status']}'>
                        Toggle
                    </a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No users found.</p>";
}

$conn->close();
?>

</body>
</html>


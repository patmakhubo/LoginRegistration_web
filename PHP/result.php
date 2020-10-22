<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mannakadb";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS " . $dbname;
if ($conn->query($sql) === TRUE) {
    $conn->close();
} else {
?>
    <script language="text/javascript">
        alert("Error creating database");
    </script>
<?php
    header("Location: ../HTML/registrationform.html");
}

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS clients(
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL 
);";

if ($conn->query($sql) === TRUE) {
    $conn->close();
} else {
?>
    <script language="text/javascript">
        alert("Error creating table");
    </script>
    <?php
}
if (isset($_POST["register"])) {
    /* Attempt MySQL server connection.*/
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Escape user inputs for security
    $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
    $lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $username = mysqli_real_escape_string($conn, $_REQUEST['username']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);
    // Attempt insert query execution
    $sql = "INSERT INTO `clients`(`firstname`, `lastname`, `email`, `username`, `password`)
    VALUES  ('$fname', '$lname', '$email', '$username', '$password')";
    if (mysqli_query($conn, $sql)) {
    ?>
        <script>
            alert("Client record added successfully.");
        </script>
    <?php
    } else {
    ?>
        <script language="text/javascript">
            alert("ERROR: Could not able to execute $sql.");
        </script>
<?php
    }

    // Close connection
    mysqli_close($conn);
    header("Location: ../HTML/registrationform.html");
}

if (isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    /* Attempt MySQL server connection.*/
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM `clients` WHERE `username`='$username'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row["password"])) {
            $Message = "Welcome " . $row["firstname"];
        } else {
            $Message = "Invalid Username or Password!";
        }
    } else {
        $Message = "Invalid Username or Password!";
    }
}
?>
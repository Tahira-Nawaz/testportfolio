<html>
<body align="center">

<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$server = "testapptahira-server.mysql.database.azure.com"; 
$database = "testapptahira-database"; 
$username = "eopjxwasip"; 
$password = "@bajwa123456789"; 

// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate POST data
$Fname = isset($_POST['First_name']) ? mysqli_real_escape_string($conn, $_POST['First_name']) : '';
$F = isset($_POST['Email_id']) ? mysqli_real_escape_string($conn, $_POST['Email_id']) : '';
$E = isset($_POST['Telephone_Number']) ? mysqli_real_escape_string($conn, $_POST['Telephone_Number']) : '';
$R = isset($_POST['comments']) ? mysqli_real_escape_string($conn, $_POST['comments']) : '';

// Check if form data is empty
if (empty($Fname) || empty($F) || empty($E) || empty($R)) {
    echo "All fields are required. Please fill out the form correctly.<br>";
    exit;
}

// Output the received values
echo "Your response is submitted successfully😀😀😀." . "<br>";
echo "<h2>Your Contact Information</h2>";
echo "Name: " . $Fname . "<br>";
echo "Email: " . $F . "<br>";
echo "Telephone Number: " . $E . "<br>";
echo "Comments: " . $R . "<br><br>";

// Insert data into the database using prepared statements
$sql = "INSERT INTO formas3 (First_name, Email_id, Telephone_Number, comments) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo "Error preparing statement: " . $conn->error . "<br>";
    exit;
}

$stmt->bind_param("ssss", $Fname, $F, $E, $R);

if ($stmt->execute()) {
    echo "<h2>Kindly Confirm your details👀</h2>Thanks...!" . "<br>";
} else {
    echo "Error inserting into table: " . $stmt->error . "<br>";
}

// Close the statement and connection
$stmt->close();
$conn->close();

?>
</body>
</html>

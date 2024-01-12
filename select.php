<!DOCTYPE html>
<html>
<head>
   <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Hotel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $idCard = $_POST["idCard"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $dateOfBirth = $_POST["dateOfBirth"];

    $updateSql = "UPDATE managers SET
                  fName = '$fName',
                  lName = '$lName',
                  idCard = '$idCard',
                  phone = '$phone',
                  gender = '$gender',
                  dateOfBirth = '$dateOfBirth'
                  WHERE email = '$email'";

    if ($conn->query($updateSql) === TRUE) {
        echo "Update successful!";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_GET["email"])) {
    $email = $_GET["email"];

    $selectSql = "SELECT * FROM managers WHERE email = '$email'";
    $result = $conn->query($selectSql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
</head>
<body>
    <h2>Update Information</h2>
    <form method="POST">
        <label for="fName">First Name:</label>
        <input type="text" name="fName" value="<?php echo $row['fName']; ?>" required><br>

        <label for="lName">Last Name:</label>
        <input type="text" name="lName" value="<?php echo $row['lName']; ?>" required><br>

        <label for="idCard">ID Card:</label>
        <input type="number" name="idCard" value="<?php echo $row['idCard']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" readonly><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br>

        <label for="gender">Gender:</label>
        <input type="text" name="gender" value="<?php echo $row['gender']; ?>"><br>

        <label for="dateOfBirth">Date of Birth:</label>
        <input type="date" name="dateOfBirth" value="<?php echo $row['dateOfBirth']; ?>"><br>

        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
<?php
    } else {
        echo "No record found for the given email.";
    }
} else {
    echo "Email parameter not provided.";
}

$conn->close();
?>

</body>
</html>
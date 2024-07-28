<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $appointments = $_POST['appointments'];

    $conn = new mysqli('localhost', 'root', '', 'hospital_management');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO doctor (name, age, gender, address, appointments)
            VALUES ('$name', $age, '$gender', '$address', '$appointments')";

    if ($conn->query($sql) === TRUE) {
        echo "Doctors added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <style>
        body {
            background-color: #606060FF;
            color: black;
            font-weight: bolder;
            font-family: "Times New Roman", sans-serif;
            text-align: center;
            margin: 0;
            padding: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #D6ED17FF;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2{
            background-color:#D6ED17FF;
            padding: 1%;
            border-radius: 35px;
        }
        label {
            display: block;
            margin: 10px 0;
            text-align: left;
        }
        input[type="text"],
        input[type="number"],
        select,
        textarea,
        input[type="date"],
        input[type="submit"] {
            width: 100%;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #606060FF;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #606060FF;
            color: #D6ED17FF;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #D6ED17FF;
            color: #606060FF;
        }
    </style>
</head>
<body>
    <h2>Add Doctor</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="age">Age:</label>
        <input type="number" name="age" required>

        <label for="gender">Gender:</label>
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </form>
</body>
</html>

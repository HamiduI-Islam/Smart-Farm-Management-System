<?php
include "../DB/db.php";

$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];

    if (
        empty($name) || empty($username) || empty($password) ||
        empty($cpassword) || empty($email) || empty($number) ||
        empty($address) || empty($dob)
    )
    {
        $error = "Invalid do again";
    }
    else
    {
        if ($password != $cpassword)
        {
            $error = "Invalid do again";
        }
        else
        {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO Farmer
            (Name, User_Name, Password, Email, Number, Address, Date_of_Birth)
            VALUES
            ('$name','$username','$hashPassword','$email','$number','$address','$dob')";

            if (mysqli_query($conn, $sql))
            {
                $success = "Registration complete";

            }
            else
            {
                $error = "ERROR " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Farmer Registration</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            justify-content: center; 
            align-items: center;             
            margin-top:160px;
            background-color: #f4f4f4;
            font-family: sans-serif;
        }
        .box {
            border: 1px solid #ccc;
            padding: 20px;
            background-color: white;
            text-align: center;
            width: 300px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="box">
        <h2>Registration Status</h2>

        <p style="color:green;">
            <?php //echo $success; ?>
        </p>
        <?php
       if (!empty($success)) {
    header("Location: ../PHP/dashboard.php");
    exit(); 
         }
?>

        <p style="color:red;"><?php echo $error; ?></p>

        <a href="../HTML/add_user.php">Register</a>
    </div>

</body>
</html>

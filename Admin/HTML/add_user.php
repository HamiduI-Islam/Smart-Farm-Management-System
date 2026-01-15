<!DOCTYPE html>
<html>
<head>
    <title>Farmer Registration</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>

<div class="box">
    <h1>Add Farmer</h1>

    <form method="post" action="../PHP/add_uservalid.php">
        Name:<br>
        <input type="text" name="name" value=""><br><br>

        User Name:<br>
        <input type="text" name="username" value=""><br><br>

        Password:<br>
        <input type="password" name="password" value=""><br><br>

        Confirm Password:<br>
        <input type="password" name="cpassword" value=""><br><br>

        Email:<br>
        <input type="email" name="email" value=""><br><br>

        Number:<br>
        <input type="text" name="number" value=""><br><br>

        Address:<br>
        <input type="text" name="address" value=""><br><br>

        Date of Birth:<br>
        <input type="date" name="dob" value=""><br><br>

        <input type="submit" value="Register">
    </form>

    <p>Back To <a href="../HTML/dashboard.php" style="color:blue;">Dashboard</a></p>
</div>

</body>
</html>

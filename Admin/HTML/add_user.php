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
<input type="text" name="name" value="" style="width: 365px; border-radius: 5px;"><br><br>

User Name:<br>
<input type="text" name="username" value="" style="width: 365px; border-radius: 5px;"><br><br>

Password:<br>
<input type="password" name="password" value="" style="width: 365px; border-radius: 5px;"><br><br>

Confirm Password:<br>
<input type="password" name="cpassword" value="" style="width: 365px; border-radius: 5px;"><br><br>

Email:<br>
<input type="email" name="email" value="" style="width: 365px; border-radius: 5px;"><br><br>

Number:<br>
<input type="text" name="number" value="" style="width: 365px; border-radius: 5px;"><br><br>

Address:<br>
<input type="text" name="address" value="" style="width: 365px; border-radius: 5px;"><br><br>

Date of Birth:<br>
<input type="date" name="dob" value="" style="width: 365px; border-radius: 5px;"><br><br>

        <input type="submit" value="Register">
    </form>

    <p>Back To <a href="../PHP/dashboard.php" style="color:blue;">Dashboard</a></p>
</div>

</body>
</html>

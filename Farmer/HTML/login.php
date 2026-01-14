<!DOCTYPE html>
<html>
<head>
    <title>Farmer Portal</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>

<div class="box">
    <h1>Farmer Portal</h1>
    <p>Welcome back to your farm</p>

    <form method="post" action="../PHP/loginvalid.php">
        Username:<br>
        <input type="text" name="username" value=""><br><br>

        Password:<br>
        <input type="password" name="password" value=""><br><br>

        <label>
            <input type="checkbox" name="remember_me"> Remember Me
        </label>
        <br><br>

        <input type="submit" value="Login">
    </form>

    <p class="register-text">
        Not registered yet?
        <a href="../HTML/register.php">Register Here</a>
    </p>
</div>

</body>
</html>

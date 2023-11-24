<?php

include "./connection.php";

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    if ($username == "") {
        echo "Tolong masukkan username";
    }
    elseif ($password == "") {
        echo "Tolong masukkan password";
    }
    elseif ($password !== $confirmpassword) {
        echo "Konfirmasi Password Salah";
    }
    else {
        $sql = "INSERT INTO table_camp(username, password) VALUES('$username', '$password')";
        if ($conn->query($sql) == TRUE) {
            header('Location: table_member.php');
        } 
        else {
            echo "Maaf ada gangguan";
        }
    }


}

$conn->close();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="post" action="/kerja_projek/register_camp.php">
        <h2>Register</h2>
        Register Username : <input type="text" name="username" placeholder="Max 30 Characters" maxlength="30" required>
        <br><br>
        Password : <input type="password" name="password" placeholder="Password" maxlength="100" required>
        <br><br>
        Confirm Password : <input type="password" name="confirmpassword" placeholder="Confirm Password" required>
        <p>Already have an account? <a href="login_camp.php"> Login</a><button type="submit"
                name="submit">Register</button></p>
    </form>

</body>

</html>
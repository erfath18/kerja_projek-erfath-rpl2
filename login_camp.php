<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="post" action="/kerja_projek/login_camp.php">
        <h2>Login</h2>
        Login Username : <input type="text" name="username" placeholder="Max 30 Characters" maxlength="30" required>
        <br><br>
        Password : <input type="password" name="password" placeholder="Password" maxlength="100" required>
        <br><br>
        <br>
        <p>Doesn't have an account? <a href="register_camp.php"> Register</a><button type="submit"
                name="submit">Login</button></p>
    </form>

</body>

</html>

<?php

include "./connection.php";

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM table_camp WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result) {
        if ($result->num_rows > 0) {
            header('Location: table_member.php');
            $_SESSION['username'] = $username;
            return false;
        } 
        else {
            if ($username == "") {
                echo "Mohon Masukkan Username";
            }
            elseif ($password == "") {
                echo "Mohon Masukkan Password";
            }
        }
    } 
    else {
        echo "akun tidak ditemukan";
    }
}

$conn->close();
?>
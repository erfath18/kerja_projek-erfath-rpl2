<?php
include "./connection.php";

if (isset($_POST["submit"])) {
    $name = $_POST["Name"];
    $class = $_POST["Class"];
    $membership = $_POST["Membership"];
    $date_membership = date("d-M-Y");
    $date = time();
    $expired_date = strtotime("+1 month", $date);
    $expired_date_membership = date("d-M-Y", $expired_date);

    $sql2 = "SELECT * FROM table_member WHERE Name='$name'";

    if ($conn->query($sql2)->num_rows == 0) {
        $sql = "INSERT INTO table_member (Name, Class, Train, Session, Date, Expired_Date) VALUES('$name', '$class', '-', '$membership', '$date_membership', '$expired_date_membership')";
        if ($conn->query($sql) == TRUE) {
            header('Location: table_member.php');
        } else {
            echo "<script>alert('Nama Member Sudah Ada')</script>";
        }
    } else {
        echo "<script>alert('Nama Member Sudah Ada')</script>";
    }
    

    // if ($conn->query($sql2)->num_rows > 0) {
        // echo "<script>alert('Nama Member Sudah Ada')</script>";
    //     if ($conn->query($sql) == TRUE) {
    //         header('Location: table_member.php');
    //     } else {
    //     echo "<script>alert('Nama Member Sudah Ada')</script>";

    //     }
    // } else {
    //     echo "<script>alert('Nama Member Sudah Ada')</script>";
    // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add member</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="post" action="/kerja_projek/add_member.php">
        <h2>Add Member</h2>
        Name : <input type="text" id="Name" name="Name" placeholder="Name" required>
        <br><br>
        Class : <select class="Class" id="Class" name="Class">
            <option value="Boxing">Boxing</option>
            <option value="Kickboxing">Kickboxing</option>
            <option value="Muaythai">Muaythai</option>
        </select>
        <br><br>
        Membership : <select class="Membership" id="Membership" name="Membership">
            <option value="1">Visit 1x</option>
            <option value="4">Regular 4x</option>
            <option value="8">Regular 8x</option>
            <option value="Unlimited">Unlimited</option>
        </select>
        <br><br>
        <button type="submit" name="submit">Add</button>
    </form>
    <?php 
    ?>
</body>

</html>
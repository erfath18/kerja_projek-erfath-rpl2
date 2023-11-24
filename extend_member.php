<?php
include("connection.php");
if(isset($_POST["submit"])) {

    $name = $_POST["Name"];
    $class = $_POST["Class"];
    $session = $_POST["Session"];
    $date_membership = date("d-M-Y");
    $date = time();
    $expired_date = strtotime("+1 month", $date);
    $expired_date_membership = date("d-M-Y", $expired_date);

    $sql = "UPDATE table_member SET Class = '$class', Train ='-', Session = '$session', Date = '$date_membership', Expired_Date = '$expired_date_membership' WHERE Name = '$name'";
    if ($conn->query($sql) == TRUE) {
        header("Location: table_member.php");
    }
    else {
        echo "koneksi gagal";
    }
    $sql2 = "UPDATE table_record_member SET Name = '-', Date = '-' ";
    if ($conn->query($sql) == TRUE) {
        header("Location: table_member.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" action="/kerja_projek/extend_member.php">
    <h2>Edit Member</h2>
        <input type="hidden" id="Name" name="Name"  value="<?= $_GET['name']; ?>">
        Class : <select class="Class" id="Class" name="Class">
            <option value="Boxing">Boxing</option>
            <option value="Kickboxing">Kickboxing</option>
            <option value="Muaythai">Muaythai</option>
        </select>
        <br><br>
        Membership : <select class="Session" id="Session" name="Session">
        <option value="1">Visit 1x</option>
            <option value="4">Regular 4x</option>
            <option value="8">Regular 8x</option>
            <option value="Unlimited">Unlimited</option>
        </select>
        <button type="submit" name="submit">Add</button>
    </form>
    
</body>
</html>
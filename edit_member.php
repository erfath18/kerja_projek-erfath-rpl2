<?php   

include("connection.php");

if(isset($_POST["submit"])) {
$name = $_POST["Name"];
$newname = $_POST["New_Name"];
    // $class = $_POST["Class"];
    // $session = $_POST["Membership"];

    $sql = "UPDATE table_member SET Name = '$newname' WHERE Name = '$name'";

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
    <form method="post" action="/kerja_projek/edit_member.php">
    <h2>Edit Member</h2>
        <input type="hidden" id="Name" name="Name"  value="<?= $_GET['name']; ?>">
        New Name : <input type="text" id="New_Name" name="New_Name" required>
        <!-- <br><br>
        Class : <select class="Class" id="Class" name="Class">
            <option value="Boxing">Boxing</option>
            <option value="Kickboxing">Kickboxing</option>
            <option value="Muaythai">Muaythai</option>
        </select>
        <br><br>
        Membership : <select class="Membership" id="Membership" name="Membership">
            <option value="1">1x</option>
            <option value="4">4x</option>
            <option value="8">8x</option>
        </select> -->
        <button type="submit" name="submit">Add</button>
    </form>
    
</body>
</html>
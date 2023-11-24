<?php
include "connection.php";

if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $sql = "DELETE FROM table_member WHERE Name = '$delete' ";
    $result = $conn->query($sql);
    if ($result) {
        header("Location: table_member.php");
    } 
    else {
        echo "akun tidak ditemukan";
    }
}
?>
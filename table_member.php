<?php

include "./connection.php";
date_default_timezone_set('Asia/Jakarta');
    // 15:00 18-Nov-2023
if (isset($_POST["Train"])) {
    $checkbox = $_POST["checkbox"];
    $date_membership = date("H:i d-M-Y");

    if ($checkbox) {
        for($i=0; $i<count($checkbox); $i++) {
            $sql = "UPDATE table_member SET
            Train = CASE WHEN Session >0 THEN
                    Train +1 WHEN Session = 'Unlimited' THEN
                    Train +1
                ELSE
                    Train END,
            Class = CASE WHEN Session = 1 THEN '-' 
                ELSE
                    Class END, 
            Date = CASE WHEN Session = 1 THEN '-'
                ELSE 
                    Date END,
            Expired_Date = CASE WHEN Session = 1 THEN '-'
                ELSE
                    Expired_Date END,
            Session = CASE WHEN Session  >1 THEN
                    Session - 1 WHEN Session = 1 THEN '-'
                ELSE
                    Session END
                    WHERE Name = '$checkbox[$i]'";
            
            $sql2 = "INSERT INTO table_record_member VALUES ('$checkbox[$i]', '$date_membership')";


            $result = $conn->query($sql);
            $result2 = $conn->query($sql2);

            if ($result && $result2) {
                header("Refresh:0");
            } 
            else {
                echo "akun tidak ditemukan";
            }
        }
    } else {
        echo "<script>alert('Please Click The Checkbox');</script>";
        header("Refresh:0");
    }    
}
?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Member</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="table.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
            <h1>Aplikasi Pendataan Membership Gym</h1>
            <button class='px-2 py-1 bg-white rounded-md text-black' onclick="window.location.href='./login_camp.php'">Logout</button>
    </nav>
    <section id="body">

        <form method="post">
    <table align="center" border="1px" class="table">
        <tr>
            <th class="thcheckbox"></th>
            <th>No.</th>
            <th>Name</th>
            <th>Class</th>
            <th>Train This Month</th>
            <th>Session Left</th>
            <th>Date</th>
            <th>Expired Date</th>
            <th>Operation</th>
        </tr>
        <?php
        include "./connection.php";
        $sql    = "SELECT * FROM table_member";
        $result = $mysql->query($sql);
        $i = 1; 
        while($row = $result->fetch_array()) {
            echo "
            <tr>
                <td>
                    <input type='checkbox' name='checkbox[]' value='".$row['Name']."' id='".$row['Name']."'>
                </td>
                <td>".$i."</td>
                <td>".$row['Name']."</td>
                <td>".$row['Class']."</td>
                <td>".$row['Train']."</td>
                <td>".$row['Session']."</td>
                <td>".$row['Date']."</td>
                <td>".$row['Expired_Date']."</td>
                <td>
                
                <button class='px-2 py-1 bg-[#dc143c] rounded-md text-black' name='Edit' type='button' onclick='window.location.href=`./edit_member.php?name=$row[Name]`'>Edit</button>            
                <button class='px-2 py-1 bg-[#dc143c] rounded-md text-black' type='button' name='Delete' value='".$row['Name']."' id='".$row['Name']."' onclick='confirm(`Apakah Anda Yakin Ingin Menghapus?`) ? window.location.href = `./hapus_member.php?delete=".$row['Name']."` : false;'>Delete</button>
                <button class='px-2 py-1 bg-[#dc143c] rounded-md text-black' name='Extend' type='button' onclick='window.location.href=`./extend_member.php?name=$row[Name]`'>Extend</button>
                <a class='px-2 py-1 bg-[#dc143c] rounded-md text-black' href='table_record_member.php?name=".$row['Name']."'>Record</a>
                </td>
            </tr>";
            $i++;
        }
        ?>
        
        
    </table>
    <button class='px-2 py-1 bg-[#dc143c] rounded-md text-black' name="Train" type="submit">Train</button>
    </section>


    </form>
    <footer >
            <div class="blok2 flex justify-end">
                <button class='px-2 py-1 bg-white rounded-md text-black' onclick="window.location.href='./add_member.php'">+Add New Member</button>
            </div>
    </footer>
    <script>
        function hapus() {
            if (confirm(`Apakah Anda Yakin Ingin Menghapus?`)) {    
                return false;
            } else {
                location.reload();
            }
        }
    </script>
</body>
</html>
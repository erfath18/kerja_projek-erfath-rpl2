<?php 

?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Member</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="table.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <!-- <nav>
        <div class="navbar">
            <h1>Home</h1>
        </div>
    </nav> -->
    <!-- <form method="post">
        <a href="add_member.php">Add New Member</a> -->
<table align="center" border="1px" class="table">
    <tr>
        <!-- <th class="thcheckbox"></th> -->
        <th>No</th>
        <th>Name</th>
        <th>Date</th>
    </tr>
    <?php
    include "./connection.php";

    $name = $_GET['name'];
    $sql    = "SELECT * FROM table_record_member WHERE name='$name'";
    $result = $mysql->query($sql);
    $i = 1; 
    while($row = $result->fetch_array()) {
        echo "
        <tr>
            <td>".$i."</td>            
            <td>".$row['Name']."</td>
            <td>".$row['Date']."</td>
            </tr>";
        $i++;
    }
    ?>
    
    
</table>
<!-- <button name="Train" type="submit">Train</button> -->

    </form>
</body>
</html>---------
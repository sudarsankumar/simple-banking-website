<?php
    include 'db_conn.php';
    $name = $_GET['id'];
    $sql = "SELECT * FROM customers_list WHERE aid =$name";
    $query=mysqli_query($conn,$sql);
    $sql1=mysqli_fetch_assoc($query);
    $id=$sql1["name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMTS | transaction history</title>
    <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" href="./css/style.css">
    <style>
        #table tbody tr td:hover
        {
            cursor: default;
        }
    </style>
</head>
<body>
    <h1><span>Transactions made by <?php echo $id; ?></span></h1>
            <?php
                include 'db_conn.php';
                $sql = "SELECT * FROM transfers_history WHERE frid=$name or toid=$name";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                ?>
                <table id="table">
                    <thead>
                        <tr>
                            <th>TId</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Amount</th>
                            <th>Debit/Credit</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                while($row = $result->fetch_assoc()) {
                    $fromId = $row["frid"];
                    $toId = $row["toid"];
                    $sql = "SELECT * FROM customers_list WHERE aid =$fromId";
                    $query=mysqli_query($conn,$sql);
                    $sql1=mysqli_fetch_assoc($query);
                    $sql = "SELECT * FROM customers_list WHERE aid =$toId";
                    $query=mysqli_query($conn,$sql);
                    $sql2=mysqli_fetch_assoc($query);
                    if($name == $fromId)
                    {
                        echo "<tr><td>" . $row["tid"]. "</td><td>" . $sql1["name"] . "</td><td>" . $sql2["name"] . "</td><td>₹ ". $row["amt"]. "</td><td class='debit'>Debit</td><td>" . $row["frbal"] . "</td>";
                    }
                    else
                    {
                        echo "<tr><td>" . $row["tid"]. "</td><td>" . $sql1["name"] . "</td><td>" . $sql2["name"] . "</td><td>₹ ". $row["amt"]. "</td><td class='credit'>Credit</td><td>" . $row["tobal"] . "</td>";
                    }
            ?>
            <?php
                }
                "</tr>";
                echo "</table>";
                } else { echo '<div class="nil-cont"><h1 style="font-size: 16px;">No Transaction history available for &ensp;' . $id. '</h1></div>'; }
            ?>
            <div class="acont">
                <a href="index.html" class="home"><span>Back to Home</span></a>
            </div>
        </tbody>
    </table>
</body>
</html>
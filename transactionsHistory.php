<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>SMTS | History of Transactions</title>
</head>
<body>
    <h1><span>History of Transactions</span></h1>
    <table id="table">
        <thead>
            <tr>
                <th>Transaction Id</th>
                <th>From</th>
                <th>To</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include 'db_conn.php';
                $sql = "SELECT * FROM transfers_history";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $fromId = $row["frid"];
                    $toId = $row["toid"];
                    $sql = "SELECT * FROM customers_list WHERE aid =$fromId";
                    $query=mysqli_query($conn,$sql);
                    $sql1=mysqli_fetch_assoc($query);
                    $sql = "SELECT * FROM customers_list WHERE aid =$toId";
                    $query=mysqli_query($conn,$sql);
                    $sql2=mysqli_fetch_assoc($query);
                    echo "<tr><td>" . $row["tid"]. "</td><td>" . $sql1["name"] . "</td><td>" . $sql2["name"] . "</td><td>₹ ". $row["amt"]. "</td>";
            ?>
            <?php
                }
                "</tr>";
                echo "</table>";
                } else { echo "0 results"; }
            ?>
        </tbody>
    </table>
    <div class="acont">
        <a href="index.html" class="home"><span>Back to Home</span></a>
    </div>
</body>
</html>
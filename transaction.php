<?php
    include 'db_conn.php';
    if(isset($_POST['submit']))
    {
        $name = $_POST['ind'];
        $id='';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMTS | transaction</title>
    <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <form method="post" action="makeTransaction.php?id=<?php echo $name; ?>">
        <table id="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'db_conn.php';
                    $sql = "SELECT aid,name,email,balance FROM customers_list WHERE aid = $name";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $id = $row["name"];
                        echo "<td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>₹ ". $row["balance"]. "</td>";
                    }
                    "</tr>";
                    echo "</table>";
                    }
                ?>
            </tbody>
        </table>
        <div class="transfers">
            <div class="options">
                <label for="transfer" class="transfer-text">Whom do you wanna transfer</label>
                <select name="transfer" required id="transfer">
                    <option value="" disabled selected>Choose one</option>
                    <?php
                        $sql = "SELECT aid,name,email,balance FROM customers_list WHERE aid != $name";
                        $result=mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option  value="<?php echo $row['aid'];?>" >
                            <?php echo $row['name'] ;?> 
                        </option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="amt-cont">
                <label for="amount" class="amt-text">Amount to be transferred</label>
                <input type="number" id="amount" name="amount" required />
            </div>
            <div class="btn-container">
                <input type="submit" value="Confirm" name="submit" class="btn" id="btn">
            </div>
        </div>
        <div class="acont">
            <a href="transactionHistory.php?id=<?php echo $name ;?>">View All transactions of <span><?php echo $id; ?></span> </a>
        </div>
    </form>
    <div class="acont">
        <a href="index.html" class="home"><span>Back to Home</span></a>
    </div>
</body>
</html>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>SMTS | view-all</title>
    <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1><span>Customers List</span></h1>
    <form action="transaction.php" method="POST">
        <table id="table" required>
            <thead>
                <tr>
                    <th>Option</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Available Balance</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'db_conn.php';
                    $sql = "SELECT aid,name,email,balance FROM customers_list";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<tr><td><input type='radio' name='' id='radio'></td><td>" . $row["aid"]. "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>₹ ". $row["balance"]. "</td>";
                ?>
                <?php
                    }
                    "</tr>";
                    echo "</table>";
                    } else { echo "0 results"; }
                ?>
            </tbody>
        </table>
        <div class="conf-container">
            <div class="confirm" name="confirm">Proceed Transaction with <span id="id" name="id"></span> ?</div>
        </div>
        <input type="hidden" name="ind" id="ind" />
        <div class="btn-container">
            <button id="btn" class="btn" name="submit">Proceed</button>
        </div>
    </form>
    <div class="acont">
        <a href="index.html" class="home"><span>Back to Home</span></a>
    </div>
    <script>
        var id = document.querySelector('#id')
        console.log(id.value)
        var ind = document.getElementById('ind')
        var btn = document.getElementById('btn')
        var confirm = document.querySelector('.confirm')
        confirm.style.display='none'
        $("#table tr").click(function() {
            $("#table tr td input:radio").prop('checked',false)
            $(this).find('td input:radio').prop('checked',true)
            confirm.style.display='block'
            id.innerText = $(this).find('td:nth-child(3)', this).html()
            console.log(id.innerText)
            ind.value = $(this).find('td:nth-child(2)', this).html()
        })
    </script>
</body>
</html>
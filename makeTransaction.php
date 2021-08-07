<?php
    include 'db_conn.php';
    $id = $_GET['id'];
    if(isset($_POST['submit']))
    {
        $fid = $id;
        $tid = $_POST['transfer'];
        $amt = $_POST['amount'];
        $sql="SELECT * from customers_list where aid=$fid";
        $query=mysqli_query($conn,$sql);
        $sql1=mysqli_fetch_assoc($query);
        $sql="SELECT * from customers_list where aid=$tid";
        $query=mysqli_query($conn,$sql);
        $sql2=mysqli_fetch_assoc($query);
        if($amt > $sql1['balance'])
        {
            echo 
                '
                    <script type="text/javascript">
                        alert("Insufficient Balance. Transaction cannot be performed");
                        window.location="index.html";
                    </script>
                ';
        }
        else
        {
            $new_bal_from = $sql1['balance']-$amt;
            $sql = "UPDATE customers_list SET balance=$new_bal_from where aid=$fid";
            mysqli_query($conn,$sql);
            $new_bal_to = $sql2['balance']+$amt;
            $sql = "UPDATE customers_list SET balance=$new_bal_to where aid=$tid";
            mysqli_query($conn,$sql);
            $sql = "INSERT INTO transfers_history(`frid`, `toid`, `amt`, `frbal`, `tobal`) VALUES ($fid,$tid,$amt,$new_bal_from,$new_bal_to)";
            $query=mysqli_query($conn,$sql);
            if($query)
            {
                echo 
                    '
                        <script type="text/javascript">
                            alert("Transaction Successful");
                            window.location="index.html";
                        </script>
                    ';
            }
            else
            {
                echo "Wrong";
            }
        }
    }
?>
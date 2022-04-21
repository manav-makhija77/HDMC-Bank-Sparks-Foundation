<!-- <?php

include 'connection.php';

if (isset($_POST['submit'])) {
    $from = $_GET['from'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];


    $sql = "SELECT * from customer where id=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customer where id=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check insufficient balance.
    else if ($amount > $sql1['balance']) {

        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check zero values
    else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {

        // deducting amount from sender's account
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE customer set balance=$newbalance where id=$from";
        mysqli_query($conn, $sql);


        // adding amount to reciever's account
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE customer set balance=$newbalance where id=$to";
        mysqli_query($conn, $sql);

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Hurray! Transaction is Successful');
            
                           </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?> -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer page</title>
    <link rel="stylesheet" href="transferpage.css">
    <link rel="icon" href="image/HDMC.jpg">
</head>

<body>
    <?php include('header.php') ?>
    <?php include('navigation.php') ?>
    <div class="main">
        <h1>Transfer Money</h1>
        <div class="main-content">
            <form method="$_POST" action="transferpage.php">
                <label for="from">From :</label>
                <select style="margin: 50px 0px 0px 57px;" name="from" id="from" required>
                    <option value="0">Select Customer</option>
                    <option value="1">Prakash Sharma</option>
                    <option value="2">Aditya Gupta</option>
                    <option value="3">Bhavya Jain</option>
                    <option value="4">Manav Singh</option>
                    <option value="5">Piyush Jain</option>
                    <option value="6">Deepak Paliwal</option>
                    <option value="7">Aman Jain</option>
                    <option value="8">Aryan Tarani</option>
                    <option value="9">Nandani Sharma</option>
                    <option value="10">Aliyah Choksi</option>
                </select>

                <label for="to">To :</label>
                <select style="margin: 50px 0px 0px 57px;" name="to" id="to" required>
                    <option value="0">Select Customer</option>
                    <option value="1">Prakash Sharma</option>
                    <option value="2">Aditya Gupta</option>
                    <option value="3">Bhavya Jain</option>
                    <option value="4">Manav Singh</option>
                    <option value="5">Piyush Jain</option>
                    <option value="6">Deepak Paliwal</option>
                    <option value="7">Aman Jain</option>
                    <option value="8">Aryan Tarani</option>
                    <option value="9">Nandani Sharma</option>
                    <option value="10">Aliyah Choksi</option>
                </select>
                <label for="amount">Amount:</label>
                <input style="margin: 50px 0px 0px 7px;" name="amount" type="number" placeholder="Enter Transfer Amount" required>

                <button name="submit" id="btn">Transfer Now</button>

            </form>
        </div>
    </div>

    <?php include('footer.php') ?>
</body>

</html>
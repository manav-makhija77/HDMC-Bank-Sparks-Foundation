<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  
</style>
<body>
    <form action="check.php" method="$_POST">
        <label for="from">Enter 1</label>
        <input type="text" name="from" id="from"><br>
        <label for="to">To :</label>
        <input type="text" name="to" id="to"><br>
        <label for="amount">Amount</label>
        <input type="number" name="amount" id="amount">
        <input type="button" value="submit">
    </form>
   
<?php

include 'connection.php';

if(isset($_POST['submit']))
{
$from = $_GET['from'];
$to = $_POST['to'];
$amount = $_POST['amount'];

echo "<script>alert('sucess')</script>";

$sql = "SELECT * from customer where sno=$from";
$query = mysqli_query($conn,$sql);
$sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

$sql = "SELECT * from customer where sno=$to";
$query = mysqli_query($conn,$sql);
$sql2 = mysqli_fetch_array($query);



// constraint to check input of negative value by user
if (($amount)<0)
{
    echo '<script type="text/javascript">';
    echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
    echo '</script>';
}



// constraint to check insufficient balance.
else if($amount > $sql1['balance']) 
{
    
    echo '<script type="text/javascript">';
    echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
    echo '</script>';
}



// constraint to check zero values
else if($amount == 0){

     echo "<script type='text/javascript'>";
     echo "alert('Oops! Zero value cannot be transferred')";
     echo "</script>";
 }


else {
    
            // deducting amount from sender's account
            $newbalance = $sql1['balance'] - $amount;
            $sql = "UPDATE customer set balance=$newbalance where id=$from";
            mysqli_query($conn,$sql);
         

            // adding amount to reciever's account
            $newbalance = $sql2['balance'] + $amount;
            $sql = "UPDATE customer set balance=$newbalance where id=$to";
            mysqli_query($conn,$sql);
            
            $sender = $sql1['name'];
            $receiver = $sql2['name'];
            $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
            $query=mysqli_query($conn,$sql);

            if($query){
                 echo "<script> alert('Hurray! Transaction is Successful');
        
                       </script>";
                
            }

            $newbalance= 0;
            $amount =0;
    }

}
?>
</body>
</html>
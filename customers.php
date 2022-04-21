<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Page</title>
    <link rel="stylesheet" href="customers.css">
    <link rel="icon" href="image/HDMC.jpg">
</head>
<style>
    td{
        background-color: blue;
        color: gold;
    }
    
</style>
<body>
    <?php include 'header.php'?>
    <?php include 'navigation.php'?>
    <div class="main">
    <div class="main-content">
            <h1>Our Bank Customers</h1>
           
            <div class="table">
                <table border="3">
                    <tr>
                        <th>S.NO</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Address (City)</th>
                        <th>Balance</th>
                    </tr>
                    <?php
                    include 'connection.php';

                    $result=mysqli_query($con,"Select * from customer");
                        while($row=mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>";
                            echo $row["id"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["name"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["email"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["address"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["balance"];
                            echo "</td>";
                            echo "</tr>";
                        }
                        $con->close();


                    ?>                  
             </table>
             <a href="transferpage.php"><button id="btn">Transfer Money</button></a>
            </div>
        </div>
    </div>
    <?php include 'footer.php'?>
</body>
</html>
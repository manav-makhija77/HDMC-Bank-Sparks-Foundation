<?php

$host= "localhost";
$user= "root";
$pass= "";
$name="sparks";

$con=mysqli_connect($host,$user,$pass,$name);

if($con){
    // echo "Connection Success";
}
else{
    die("Failed to Connect to the server"+mysqli_connect_error());
};

?>
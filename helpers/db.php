<?php

$con=mysqli_connect("localhost","root","141154","project");
if($con){
    echo "connected";
}
else
{
    echo "no connection with database" ;
    echo mysqli_connect_error();
}
session_start();
?>
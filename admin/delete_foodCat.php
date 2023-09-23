<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

$result = mysqli_query($db,"SELECT * FROM dishes WHERE fc_id= '".$_GET['cat_del']."'");

if(mysqli_num_rows($result) == 0) {
    mysqli_query($db,"DELETE FROM food_category WHERE fc_id = '".$_GET['cat_del']."'");
    header("location:add_foodCat.php");  
} else {
    header("location:add_foodCat.php?not_poss");
}


?>

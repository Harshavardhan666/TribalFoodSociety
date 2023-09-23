<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
// $del_id=$_GET['res_del'];
$result = mysqli_query($db,"SELECT * FROM food_category WHERE rs_id = '".$_GET['res_del']."'");

if(mysqli_num_rows($result) == 0) {
    mysqli_query($db,"DELETE FROM restaurant WHERE rs_id = '".$_GET['res_del']."'");
    header("location:all_restaurant.php");
} else {
    header("location:all_restaurant.php?not_poss");
}

?>

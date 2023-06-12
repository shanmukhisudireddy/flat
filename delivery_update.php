<?php
  include'admin/db_connect.php';
  $order_id = $_REQUEST["order_id"];
  $order_status = $_REQUEST["order_status"];
  $update_query = "UPDATE delivery set order_status = '".$order_status."' where order_id='".$order_id."'";
  if ($conn->query($update_query) === FALSE) {
    echo "Error occured";
  } else {
    echo "Updated successfully";
  }
  mysqli_close($conn);
?>
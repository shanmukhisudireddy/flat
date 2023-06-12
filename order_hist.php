<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link rel="icon" href="./Images/Restaurants/download.png" type="image/icon type"> <!-- href link to be changed-->
<link rel="stylesheet" href="C:\xampp\htdocs\fos\css\delivery.css">  <!-- href link to be changed-->
<link rel="stylesheet" href="C:\xampp\htdocs\fos\css\slider.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style>
    	header.masthead {
		  background: url(assets/img/<?php echo $_SESSION['setting_cover_img'] ?>);
		  background-repeat: no-repeat;
		  background-size: cover;
		}

        .table-container {
    padding: 20px;
        }
    </style>
</head>
<header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end mb-4 page-title">
                	<h3 class="text-white">Order History</h3>
                    <hr class="divider my-4" />

                </div>
                
            </div>
        </div>
    </header>
<body>
<div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
        </div>
      </div>
        
<br><br><br>
        <section>
        <div class="table-responsive pb-5 table-container">
  <table id="tbOrderHistory"class="table table-striped">
    <thead style='color: #f37a27'>
      <tr>
        <th scope="col">Order_id</th>
        <th scope="col">Date</th>
        <th scope="col">Bill amount</th>
        <th scope="col">Order Status</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        include'admin/db_connect.php';
        $qry = $conn->query("SELECT * FROM delivery where user_login = '".$_SESSION['login_last_name']."'");
        while($row= $qry->fetch_assoc()) {
            echo "<tr><td scope=\"row\">".($row['order_id'])."</td>
                      <td>".($row['order_date'])."</td>
                      <td>".($row['bill_amnt'])."</td>
                      <td>".($row['order_status'])."</td>
                      </tr>";
        }
    ?>           
    </tbody>
  </table>
</div>
        </section>
       

<!--side bar-->

<!--Footer Section-->
<footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted"> Amrita Vishwa Vidyapeetham</div></div>
        </footer>
        
       <?php include('footer.php') ?>

<!--Home  ends-->

</body>
</html>
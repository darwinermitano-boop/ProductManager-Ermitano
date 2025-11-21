<?php
  $page = 'Orders';
?>
<!doctype html>
<html lang="en">
 <?php
 include 'component/head.php';
 ?>
  <body>
 <?php
 include 'component/nav.php';
 ?>   

<div class="container-fluid">
  <div class="row">
    <?php
      include 'component/sidebar.php';
      ?>  

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Order</h1>        
      </div>

      <!-- <a href="products-form.php" class="btn btn-success text-white mb-3 float-right"><i class="fas fa-plus-square"></i> New Product</a>
       -->

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>Customer</th>
              <th>Date</th>              
              <th>Subtotal</th>
              <th>Tax</th>
              <th>Total</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

          <?php
            include 'functions/orders.php';
            $orders = getAllOrders(); //call getAllOrders function
            //loop all order and display
            foreach($orders as $orders){           
          ?>
            <tr>
              <td><?=$orders['id']?></td>
              <td><?=$orders['customer']?:'Unknown Customer'?></td>
              <td><?=$orders['date']?></td>
              <td><?= number_format($orders['inv_subtotal'], 2)?></td>
              <td><?= number_format($orders['inv_tax'], 2)?></td>
              <td><?= number_format($orders['inv_total'], 2)?></td>
              <td >
                <div class="btn-group btn-group-toggle" data-toggle="buttons">                  
                  <label class="btn btn-primary btn-sm">
                    <a href="" class="text-white"><i class="fas fa-pen"></i></a>
                  </label>
                  <label class="btn btn-danger btn-sm">
                    <a href="orders/delete.php?id=<?=$orders['id']?>" class="text-white"><i class="fas fa-trash"></i></a>
                  </label>
                </div>
              </td>
            </tr>
          <?php  } ?> 
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="js/dashboard.js"></script>
  </body>
</html>
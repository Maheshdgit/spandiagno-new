<div class="content-body">
   <div class="container-fluid">
      <div class="table-responsive">
         <table class="table table-responsive-md">
            <thead>
               <tr>
                  <th><strong>Id</strong></th>
                  <th><strong>Coupon Name</strong></th>
                  <th><strong>Discount (%)</strong></th>
                  <th><strong></strong></th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  include 'conn.php';
                  $sql = "SELECT * FROM spancoupons WHERE active =1";
                  $result = mysqli_query($conn,$sql);
                  if(mysqli_num_rows($result) > 0){
                    while( $row = mysqli_fetch_assoc($result)){
                  ?>
               <tr>
                  <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['coupon'];?></td>
                  <td><?php echo $row['percentage'];?></td>
                  <td><button class="btn btn-primary edt" value="<?php echo $row['uniq'];?>"></button><button class="btn btn-danger del" value="<?php echo $row['uniq'];?>"></button></td>
               </tr>
               <?php
                  }
                  }
                      ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
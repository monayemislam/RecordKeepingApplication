<?php $this->extend('dashboard'); ?>
<?php $this->section('content'); ?>






<table id="sellTable" class="table display">
  <thead>
    <tr class="text-center bg-info">
      <th scope="col">Sell ID</th>
      <th scope="col">C.ID</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Unit</th>
      <th scope="col">Price</th>
      <th scope="col">Payment</th>
      <th scope="col">Sell Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($sellInfo as $sell):?>
    <tr class="text-center">
      <td><?=$sell['sellId']?></td>
      <td><?=$sell['customerId']?></td>
      <td><?=$sell['productName']?></td>
      <td><?=$sell['quantity']?></td>
      <td><?=$sell['unit']?></td>
      <td><?=$sell['price']?></td>
      <td><?=$sell['payment']?></td>
      <td><?=$sell['sellDate']?></td>
      <td>
        <div class="btn-group btn-group-sm">
          <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#editModal<?=$sell['sellId']?>">Edit</a>

          <a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal<?=$sell['sellId']?>">Delete</a>
        </div>
      </td>
    </tr>


<div class="modal fade" id="deleteModal<?=$sell['sellId']?>" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-danger">Delete</h3>
      </div>
      <div class="modal-body">
        <h5>Are you sure want to delete?</h5>
      </div>
      <div class="modal-footer">
        <a href="<?php echo site_url('admin/deleteSellInfo/'.$sell['sellId']) ?>" class="btn btn-outline-danger">Yes</a>
        <button type="button" class="btn btn-outline-success" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>






<div class="modal fade" id="editModal<?=$sell['sellId']?>" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-primary">Edit</h3>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('admin/editSellInfo/'.$sell['sellId']) ?>" method="post">
            
                <div class="form-group">
                  <label>Customer Id:</label>
                  <input type="text" class="form-control" name="customerId" value="<?=$sell['customerId']?>">
                </div>

                <div class="form-group">
                  <label>Type:</label>
                  <input type="text" class="form-control" name="transactionType" value="<?=$sell['transactionType']?>">
                </div>

                



                <div class="form-group">
                  <label>Product:</label>
                  <select name="productName" class="form-control">
                    <?php 
                      foreach ($productsInfo as $product) {
                        echo '<option value="'.$product['productName'].'">'.$product['productName'].'</option>';
                      }
                    ?>
                </select>
                </div>

                <div class="form-group">
                  <label>Quantity:</label>
                  <input type="text" class="form-control" name="quantity" value="<?=$sell['quantity']?>">
                </div>

                <div class="form-group">
                  <label>Unit:</label>
                  <input type="text" class="form-control" name="unit" value="<?=$sell['unit']?>">
                </div>

                <div class="form-group">
                  <label>Price:</label>
                  <input type="text" class="form-control" name="price" value="<?=$sell['price']?>">
                </div>

                <div class="form-group">
                  <label>Payment:</label>
                  <input type="text" class="form-control" name="payment" value="<?=$sell['payment']?>">
                </div>

                <div class="form-group">
                  <label>Date:</label>
                  <input type="date" class="form-control" name="sellDate" value="<?=$sell['sellDate']?>">
                </div>

                <div class="form-group">
                  <label>Sell Id:</label>
                  <input type="text" class="form-control" name="sellId" value="<?=$sell['sellId']?>">
                </div>

                
            <button type="submit" class="btn btn-outline-success">Update</button>
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>






    <?php endforeach;?>
  </tbody>
</table>


<script type="text/javascript">
  $(document).ready(function() {
    $('#sellTable').DataTable(

      // dom: 'Bfrtip',
      // buttons: [
      //   'copy','csv','excel','pdf','print'
      // ]
      
      );
} );
</script>







<?php $this->endSection(); ?>
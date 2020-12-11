<?php $this->extend('dashboard'); ?>
<?php $this->section('content'); ?>






<table id="sellTable" class="table display">
  <thead>
    <tr class="text-center bg-info">
      <th scope="col">Return ID</th>
      <th scope="col">C.ID</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Unit</th>
      <th scope="col">Price</th>
      <th scope="col">Returned</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($returnInfo as $returnProduct):?>
    <tr class="text-center">
      <td><?=$returnProduct['returnId']?></td>
      <td><?=$returnProduct['customerId']?></td>
      <td><?=$returnProduct['productName']?></td>
      <td><?=$returnProduct['quantity']?></td>
      <td><?=$returnProduct['unit']?></td>
      <td><?=$returnProduct['price']?></td>
      <td><?=$returnProduct['returnedAmount']?></td>
      <td><?=$returnProduct['returnDate']?></td>
      <td>
        <div class="btn-group btn-group-sm">
          <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#editModal<?=$returnProduct['returnId']?>">Edit</a>

          <a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal<?=$returnProduct['returnId']?>">Delete</a>
        </div>
      </td>
    </tr>


<div class="modal fade" id="deleteModal<?=$returnProduct['returnId']?>" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-danger">Delete</h3>
      </div>
      <div class="modal-body">
        <h5>Are you sure want to delete?</h5>
      </div>
      <div class="modal-footer">
        <a href="<?php echo site_url('admin/deletereturnInfo/'.$returnProduct['returnId']) ?>" class="btn btn-outline-danger">Yes</a>
        <button type="button" class="btn btn-outline-success" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>






<div class="modal fade" id="editModal<?=$returnProduct['returnId']?>" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-primary">Edit</h3>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('admin/editReturnInfo/'.$returnProduct['returnId']) ?>" method="post">
            
                <div class="form-group">
                  <label>Customer Id:</label>
                  <input type="text" class="form-control" name="customerId" value="<?=$returnProduct['customerId']?>">
                </div>

                <div class="form-group">
                  <label>Return Id:</label>
                  <input type="text" class="form-control" name="returnId" value="<?=$returnProduct['returnId']?>">
                </div>

                <div class="form-group">
                  <label>Type:</label>
                  <input type="text" class="form-control" name="transactionType" value="<?=$returnProduct['transactionType']?>">
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
                  <input type="text" class="form-control" name="quantity" value="<?=$returnProduct['quantity']?>">
                </div>

                <div class="form-group">
                  <label>Unit:</label>
                  <input type="text" class="form-control" name="unit" value="<?=$returnProduct['unit']?>">
                </div>

                <div class="form-group">
                  <label>Price:</label>
                  <input type="text" class="form-control" name="price" value="<?=$returnProduct['price']?>">
                </div>

                <div class="form-group">
                  <label>Returned:</label>
                  <input type="text" class="form-control" name="returnedAmount" value="<?=$returnProduct['returnedAmount']?>">
                </div>

                <div class="form-group">
                  <label>Date:</label>
                  <input type="date" class="form-control" name="sellDate" value="<?=$returnProduct['returnDate']?>">
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
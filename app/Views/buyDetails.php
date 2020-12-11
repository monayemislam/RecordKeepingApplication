<?php $this->extend('dashboard'); ?>
<?php $this->section('content'); ?>







<table id="buyTable" class="table display p-2">
  <thead>
    <tr class="text-center bg-info">
      <th scope="col">Buy ID</th>
      <th scope="col">Product ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Unit</th>
      <th scope="col">Price</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($buyInfo as $buy):?>
    <tr class="text-center">
      <td><?=$buy['buyId']?></td>
      <td><?=$buy['productId']?></td>
      <td><?=$buy['productName']?></td>
      <td><?=$buy['quantity']?></td>
      <td><?=$buy['unit']?></td>
      <td><?=$buy['price']?></td>
      <td><?=$buy['date']?></td>
      <td>
        <div class="btn-group btn-group-sm">

          <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#editModal<?=$buy['buyId']?>">Edit</a>

          <a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal<?=$buy['buyId']?>">Delete</a>

        </div>
      </td>
    </tr>


<div class="modal fade" id="deleteModal<?=$buy['buyId']?>" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-danger">Delete</h3>
      </div>
      <div class="modal-body">
        <h5>Are you sure want to delete?</h5>
      </div>
      <div class="modal-footer">
        <a href="<?php echo site_url('admin/deleteBuyInfo/'.$buy['buyId']) ?>" class="btn btn-outline-danger">Yes</a>
        <button type="button" class="btn btn-outline-success" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>






<div class="modal fade" id="editModal<?=$buy['buyId']?>" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-primary">Edit</h3>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('admin/editBuyInfo/'.$buy['buyId']) ?>" method="post">
            
                <div class="form-group">
                  <label>Product Name:</label>
                  <input type="text" class="form-control" name="productName" value="<?=$buy['productName']?>">
                </div>

                <div class="form-group">
                  <label>Quantity:</label>
                  <input type="text" class="form-control" name="quantity" value="<?=$buy['quantity']?>">
                </div>

                <div class="form-group">
                  <label>Unit:</label>
                  <input type="text" class="form-control" name="unit" value="<?=$buy['unit']?>">
                </div>

                <div class="form-group">
                  <label>Price:</label>
                  <input type="text" class="form-control" name="price" value="<?=$buy['price']?>">
                </div>

                <div class="form-group">
                  <label>Date:</label>
                  <input type="date" class="form-control" name="date" value="<?=$buy['date']?>">
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
    $('#buyTable').DataTable(

      // dom: 'Bfrtip',
      // buttons: [
      //   'copy','csv','excel','pdf','print'
      // ]
      
      );
} );
</script>







<?php $this->endSection(); ?>
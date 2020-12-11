<?php $this->extend('dashboard'); ?>
<?php $this->section('content'); ?>



<a href="<?=base_url('admin/addProduct')?>" class="m-3 btn btn-outline-success">Add Product</a>


<table id="productTable" class="table display p-2">
  <thead>
    <tr class="text-center bg-info">
      <th scope="col">Product ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Type</th>
      <th scope="col">Product Added</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($productsInfo as $product):?>
    <tr class="text-center">
      <td><?=$product['productId']?></td>
      <td><?=$product['productName']?></td>
      <td><?=$product['productType']?></td>
      <td><?=$product['productAddDate']?></td>
      <td>
        <div class="btn-group btn-group-sm">

          <a href="<?php echo site_url('admin/buyProduct/'.$product['productId'].'/'.$product['productName']) ?>" class="btn btn-outline-success">Buy</a>

          <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#editModal<?=$product['productId']?>">Edit</a>

          <a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal<?=$product['productId']?>">Delete</a>

        </div>
      </td>
    </tr>


<div class="modal fade" id="deleteModal<?=$product['productId']?>" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-danger">Delete</h3>
      </div>
      <div class="modal-body">
        <h5>Are you sure want to delete?</h5>
      </div>
      <div class="modal-footer">
        <a href="<?php echo site_url('admin/deleteProductInfo/'.$product['productId']) ?>" class="btn btn-outline-danger">Yes</a>
        <button type="button" class="btn btn-outline-success" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>






<div class="modal fade" id="editModal<?=$product['productId']?>" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-primary">Edit</h3>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('admin/editProductInfo/'.$product['productId']) ?>" method="post">
            
                <div class="form-group">
                  <label>Name:</label>
                  <input type="text" class="form-control" name="productName" value="<?=$product['productName']?>">
                </div>

                <div class="form-group">
                  <label>Product Type</label>
                  <input type="text" name="productType" class="form-control" value="<?=$product['productType']?>">
                </div>

                <div class="form-group">
                  <label>Product Added:</label>
                  <input type="date" class="form-control" name="productAddDate" value="<?=$product['productAddDate']?>">
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
    $('#productTable').DataTable(

      // dom: 'Bfrtip',
      // buttons: [
      //   'copy','csv','excel','pdf','print'
      // ]
      
      );
} );
</script>







<?php $this->endSection(); ?>
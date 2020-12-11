<?php $this->extend('dashboard'); ?>
<?php $this->section('content'); ?>


<div class="">
    <div class="row justify-content-center align-items-center">
        <div class="col-9 col-md-8 col-lg-6 card">
            <form class="px-5 py-3 card-body" action="<?php echo base_url('admin/buyProductSubmit') ?>" method="post">
                <h4 class="text-center">Product Information</h4>

                
                <?php 
                  if (isset($submitted)) 
                  {
                    echo "<script>alert('Successfully Saved');</script>";
                  }
                ?>

                <div class="form-group">
                  <label>Product Id:</label>
                  <input type="text" class="form-control" name="productId" value="<?=$productId;?>" required>
                </div>
                <div class="form-group">
                  <label>Product Name:</label>
                  <input type="text" class="form-control" name="productName" value="<?=$productName;?>" required>
                </div>
                <div class="form-group">
                  <label>Quantity:</label>
                  <input type="text" class="form-control" id="quantity" name="quantity" required>
                </div>
                <div class="form-group">
                  <label>Unit:</label>
                  <input type="text" class="form-control" name="unit" required>
                </div>
                <div class="form-group">
                  <label>Price:</label>
                  <input type="text" class="form-control" name="price" required>
                </div>
                <div class="form-group">
                  <label>Date:</label>
                  <input type="date" class="form-control" name="date" required>
                </div>
                <button type="submit" class="btn btn-outline-success">Save</button>
            </form>
        </div>
    </div>
</div>






<?php $this->endSection(); ?>
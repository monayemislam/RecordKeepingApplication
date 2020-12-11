<?php $this->extend('dashboard'); ?>
<?php $this->section('content'); ?>








<div class="">
    <div class="row justify-content-center align-items-center">
        <div class="col-9 col-md-8 col-lg-6">
            <form class="bg-white px-5 py-3" action="<?php echo base_url('admin/submitProductInformation') ?>" method="post">
                <h4 class="text-center">Product Information</h4>

                <?=\Config\Services::validation()->listErrors();?>
                <?php 
                  if (isset($submitted)) 
                  {
                    echo '<div class="alert alert-success">'.$submitted.'</div>';
                  }
                ?>

                <div class="form-group">
                  <label>Product Name:</label>
                  <input type="text" class="form-control" name="productName">
                </div>
                <div class="form-group">
                  <label>Product Type:</label>
                  <input type="text" name="productType" class="form-control">
                </div>
                <div class="form-group">
                  <label>Date:</label>
                  <input type="date" class="form-control" name="productAddDate">
                </div>
                <button type="submit" class="btn btn-outline-success">Add Product</button>
            </form>
        </div>
    </div>
</div>











<?php $this->endSection(); ?>
<?php $this->extend('dashboard'); ?>
<?php $this->section('content'); ?>



<div class="">
    <div class="row justify-content-center align-items-center">
        <div class="col-9 col-md-8 col-lg-6 card">
            <form class="px-5 py-3 card-body" action="<?php echo base_url('admin/submitCustomerInformation') ?>" method="post">
                <h4 class="text-center">Customer Information</h4>

                <?=\Config\Services::validation()->listErrors();?>
                <?php 
                  if (isset($submitted)) 
                  {
                    echo '<div class="alert alert-success">'.$submitted.'</div>';
                  }
                ?>

                <div class="form-group">
                  <label>Name:</label>
                  <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                  <label>Address:</label>
                  <input type="text" class="form-control" name="address">
                </div>
                <div class="form-group">
                  <label>Mobile:</label>
                  <input type="text" class="form-control" name="number">
                </div>
                <div class="form-group">
                  <label>Email:</label>
                  <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                  <label>Date:</label>
                  <input type="date" class="form-control" name="date">
                </div>
                <button type="submit" class="btn btn-outline-success">Add Customer</button>
            </form>
        </div>
    </div>
</div>






<?php $this->endSection(); ?>
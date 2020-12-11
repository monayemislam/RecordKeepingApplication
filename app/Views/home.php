<?php include 'header.php'; ?>



<div class="container-fluid h-100" id="background_image">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">

            <form class="bg-white p-5" action="<?php echo base_url('home/checkuser') ?>" method="post">
                <?=\Config\Services::validation()->listErrors();?>


                <?php 
                  if (isset($invalid_login)) {
                    echo '<div class="alert alert-danger">'.$invalid_login.'</div>';
                  }
                 ?>
                <div class="form-group">
                  <label>Username:</label>
                  <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                  <label>Password:</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>







<?php include 'footer.php';?>
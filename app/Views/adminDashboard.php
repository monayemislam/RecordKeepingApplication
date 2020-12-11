<?php $this->extend('dashboard'); ?>
<?php $this->section('content'); ?>



<div class="row mb-3 p-2">

    <div class="col-xl-3 col-sm-6 py-2">
        <div class="card bg-success text-white h-100">
           	<div class="card-body bg-success">
                <h6 class="text-uppercase">Customer</h6>
                <h1 class="display-4 text-center"><?=$numberOfCustomer; ?></h1>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 py-2">
        <div class="card text-white bg-danger h-100">
            <div class="card-body bg-danger">
                <h6 class="text-uppercase">Products</h6>
                <h1 class="display-4 text-center"><?=$numberOfProduct;?></h1>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 py-2">
        <div class="card text-white bg-info h-100">
            <div class="card-body bg-info">
                <h6 class="text-uppercase">Sell</h6>
                <h1 class="display-4 text-center"><?=$numberOfSell;?></h1>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 py-2">
        <div class="card text-white bg-warning h-100">
            <div class="card-body">
                <h6 class="text-uppercase">Return</h6>
                <h1 class="display-4 text-center"><?=$numberOfReturn?></h1>
            </div>
        </div>
    </div>

</div>









<?php $this->endSection(); ?>
<?php $this->extend('dashboard'); ?>
<?php $this->section('content'); ?>


<?php 

	if (is_null($totalProductPrice)) {
		$totalProductPrice=0;
	}
	else{
		 $totalProductPrice=0+$totalProductPrice;
	}


	if (is_null($totalPayment)) {
		$totalPayment=0;
	}
	else{
		 $totalPayment=0+$totalPayment;
	}


	if (is_null($returnedProductPrice)) {
		$returnedProductPrice=0;
	}
	else{
		 $returnedProductPrice=0+$returnedProductPrice;
	}

	if (is_null($returned)) {
		$returned=0;
	}
	else{
		 $returned=0+$returned;
	}

 ?>

<div class="h2 text-center pb-2"><u>Account Details</u></div>

<div class="row container">
	<div class="col-md-5 col">


		<div class="card">
		  <h5 class="card-header">Basic Inforamation</h5>
		  <div class="card-body">
		    <ul style="list-style-type: none;" class="text-justify">
				<li>Customer ID: <?= $id; ?></li>
				<li>Name: <?= $customerName; ?></li>
				<li>Address: <?= $customerAddress; ?></li>
				<li>Mobile: <?= $customerMobile; ?></li>
				<li>Email: <?= $customerEmail; ?></li>
			</ul>
		  </div>
		</div>

	</div>
	<div class="col-md-7 col">
		<table class="table">
			<tr>
				<td>Price of Products:</td>
				<td class="text-right"><?= $totalProductPrice; ?></td>
			</tr>
			<tr>
				<td>Paid:</td>
				<td class="text-right"><?= $totalPayment; ?></td>
			</tr>
			<tr>
				<td>Price of Product (Returned):</td>
				<td class="text-right"><?=$returnedProductPrice;?></td>
			</tr>
			<tr>
				<td>Returned:</td>
				<td class="text-right"><?=$returned;?></td>
			</tr>
			<tr class="font-weight-bold">
				<td>Current Balance:</td>
				<td class="text-right"><?=$currentBalance;?></td>
			</tr>
		</table>
	</div>
</div>










<?php $this->endSection(); ?>
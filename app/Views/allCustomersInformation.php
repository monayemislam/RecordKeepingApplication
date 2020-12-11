<?php $this->extend('dashboard'); ?>
<?php $this->section('content'); ?>



<a href="<?=base_url('admin/addNewCustomer')?>" class="m-2 btn btn-outline-success">Add Customer</a>


<table id="customerInfoTable" class="table display p-2">
  <thead>
    <tr class="text-center bg-info">
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">mobile</th>
      <th scope="col">Email</th>
      <th scope="col">R.Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($customersInfo as $customer):?>
    <tr class="text-center">
      <td><?=$customer['id']?></td>
      <td><?=$customer['name']?></td>
      <td><?=$customer['address']?></td>
      <td><?=$customer['mobile']?></td>
      <td><?=$customer['email']?></td>
      <td><?=$customer['registration_date']?></td>
      <td>
        <div class="btn-group btn-group-sm">
          <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#editModal<?=$customer['id']?>">Edit</a>

          <a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal<?=$customer['id']?>">Delete</a>
        </div>
      </td>
    </tr>


<div class="modal fade" id="deleteModal<?=$customer['id']?>" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-danger">Delete</h3>
      </div>
      <div class="modal-body">
        <h5>Are you sure want to delete?</h5>
      </div>
      <div class="modal-footer">
        <a href="<?php echo site_url('admin/deleteCustomerInfo/'.$customer['id']) ?>" class="btn btn-outline-danger">Yes</a>
        <button type="button" class="btn btn-outline-success" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>






<div class="modal fade" id="editModal<?=$customer['id']?>" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-primary">Edit</h3>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('admin/editCustomerInfo/'.$customer['id']) ?>" method="post">
            
                <div class="form-group">
                  <label>Name:</label>
                  <input type="text" class="form-control" name="name" value="<?=$customer['name']?>">
                </div>
                <div class="form-group">
                  <label>Address:</label>
                  <input type="text" class="form-control" name="address" value="<?=$customer['address']?>">
                </div>
                <div class="form-group">
                  <label>Mobile:</label>
                  <input type="text" class="form-control" name="mobile" value="<?=$customer['mobile']?>">
                </div>
                <div class="form-group">
                  <label>Email:</label>
                  <input type="email" class="form-control" name="email" value="<?=$customer['email']?>">
                </div>
                <div class="form-group">
                  <label>Date:</label>
                  <input type="date" class="form-control" name="registration_date" value="<?=$customer['registration_date']?>">
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
    $('#customerInfoTable').DataTable(

      // dom: 'Bfrtip',
      // buttons: [
      //   'copy','csv','excel','pdf','print'
      // ]
      
      );
} );
</script>







<?php $this->endSection(); ?>
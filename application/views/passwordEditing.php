d<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 50%">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('passwordEditing/passwordEditingAction') ?>">

            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="newPassword"class="form-control">
                <?php echo form_error('newPassword', '<div class="text-small" text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmPassword"class="form-control">
                <?php echo form_error('confirmPassword', '<div class="text-small" text-danger"></div>') ?>
            </div>

            <button type="submit" class="btn btn-success">Save</button>

            </form>
        </div>
    </div>

        
</div>
             

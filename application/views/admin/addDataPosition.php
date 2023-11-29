<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

        <div class="card" style="width: 60%; margin-bottom: 100px">
            <div class="card-body">

                <form method="POST" action="<?php echo base_url('admin/dataPosition/addDataAction') ?>">

                <div class="form-group">
                    <label>Name Position</label>
                    <input type="text" name="name_position" class="form-control">
                    <?php echo form_error('name_position','<div class="text-small text-danger"></div>') ?>
                </div>
                
                <div class="form-group">
                    <label>Basic Salary</label>
                    <input type="text" name="basic_salary" class="form-control">
                    <?php echo form_error('basic_salary','<div class="text-small text-danger"></div>') ?>
                </div>
                
                <div class="form-group">
                    <label>Transport Allowance</label>
                    <input type="text" name="transport_allowance" class="form-control">
                    <?php echo form_error('transport_allowance','<div class="text-small text-danger"></div>') ?>
                </div>
                
                <div class="form-group">
                    <label>Meal Allowance</label>
                    <input type="text" name="meal_allowance" class="form-control">
                    <?php echo form_error('meal_allowance','<div class="text-small text-danger"></div>') ?>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>

                </form>
        </div>
</div>
             

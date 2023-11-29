<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

        <div class="card" style="width: 60%; margin-bottom: 100px">
            <div class="card-body">

                 <!-- take data position -->
                <?php foreach ($position as $p): ?>
                <form method="POST" action="<?php echo base_url('admin/dataPosition/updateDataAction') ?>">

                <div class="form-group">
                    <label>Name Position</label>
                    <input type="hidden" name="id_position" class="form-control" value="<?php echo $p->id_position ?>">
                    <input type="text" name="name_position" class="form-control" value="<?php echo $p->name_position ?>">
                    <?php echo form_error('name_position','<div class="text-small text-danger"></div>') ?>
                </div>
                
                <div class="form-group">
                    <label>Basic Salary</label>
                    <input type="number" name="basic_salary" class="form-control" value="<?php echo $p->basic_salary ?>">
                    <?php echo form_error('basic_salary','<div class="text-small text-danger"></div>') ?>
                </div>
                
                <div class="form-group">
                    <label>Transport Allowance</label>
                    <input type="number" name="transport_allowance" class="form-control" value="<?php echo $p->transport_allowance ?>">
                    <?php echo form_error('transport_allowance','<div class="text-small text-danger"></div>') ?>
                </div>
                
                <div class="form-group">
                    <label>Meal Allowance</label>
                    <input type="number" name="meal_allowance" class="form-control" value="<?php echo $p->meal_allowance ?>">
                    <?php echo form_error('meal_allowance','<div class="text-small text-danger"></div>') ?>
                </div>

                <button type="submit" class="btn btn-success">Update</button>

                </form>
                <?php endforeach; ?>
        </div>
</div>
             

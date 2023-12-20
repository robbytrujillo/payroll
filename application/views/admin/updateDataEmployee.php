<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">
            <?php foreach($employee as $e) :?>
        
            <form method="POST" action="<?php echo base_url('admin/dataEmployee/updateDataAction') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>NIK</label>
                <input type="hidden" name="id_employee" class="form-control" value="<?php echo $e->id_employee ?>">
                <input type="number" name="nik" class="form-control" value="<?php echo $e->nik ?>">
                <?php echo form_error('nik','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Name Employee</label>
                <input type="text" name="name_employee" class="form-control" value="<?php echo $e->name_employee ?>">
                <?php echo form_error('name_employee','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $e->username ?>>
                <?php echo form_error('username','<div class="text-small text-danger"></div>') ?>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $e->password ?>>
                <?php echo form_error('password','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="<?php echo $e->gender ?>">
                <?php echo $e->gender ?>
                </option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>  
            <?php echo form_error('gender','<div class="text-small text-danger"></div>') ?>  
            </div>

            <div class="form-group">
                <label>Position</label>
            <select name="position" class="form-control">
                <option value="<?php echo $e->position ?>">
                <?php echo $e->position ?>
                </option>
                <?php foreach($position as $p): ?>
                <option value="<?php echo $p->name_position ?>"><?php echo $p->name_position ?></option>
                <?php endforeach ?>
                </select> 
            <?php echo form_error('position','<div class="text-small text-danger"></div>') ?>   
            </div>

            <div class="form-group">
                <label>Status</label>
            <select name="status" class="form-control">
                <option value="<?php echo $e->status ?>">
                <?php echo $e->status ?>
                </option>
                <option value="permanent_employees">Permanent Employees</option>
                <option value="contract_employees">Contract Employees</option>
            </select>    
            <?php echo form_error('status','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Date Join</label>
                <input type="date" name="date_join" class="form-control" value="<?php echo $e->date_join ?>">
                <?php echo form_error('date_join','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Photo</label>
                <input type="file" name="photo" class="form-control">
                
            </div>

            <div class="form-group">
                <label>Access Right</label>
                <select name="access_right" class="form-control">
                <option value="<?php echo $e->access_right ?>">
                <?php 
                    if ($e->access_right=='1') {
                        echo "Admin";
                    } else {
                        echo "Employee";
                    } ?>
                </option>
                <option value="1">Admin</option>
                <option value="1">Employee</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>

        </form>

        <?php endforeach ?>

        </div>
    </div>

        
</div>
             
<!-- <?php echo $e->access_right ?> -->
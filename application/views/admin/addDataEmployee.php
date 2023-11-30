<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/dataEmployee/addDataAction') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>NIK</label>
                <input type="number" name="nik" class="form-control">
                <?php echo form_error('nik','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Name Employee</label>
                <input type="text" name="name_employee" class="form-control">
                <?php echo form_error('name_employee','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="">
                    --Select Gender--
                </option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>  
            <?php echo form_error('gender','<div class="text-small text-danger"></div>') ?>  
            </div>

            <div class="form-group">
                <label>Position</label>
            <select name="position" class="form-control">
                <option value="">
                    --Select Position--
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
                <option value="">
                    --Select Status--
                </option>
                <option value="permanent_employees">Permanent Employees</option>
                <option value="contract_employees">Contract Employees</option>
            </select>    
            <?php echo form_error('status','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Date Join</label>
                <input type="date" name="date_join" class="form-control">
                <?php echo form_error('date_join','<div class="text-small text-danger"></div>') ?>
            </div>

            <div class="form-group">
                <label>Photo</label>
                <input type="file" name="photo" class="form-control">
                <?php echo form_error('photo','<div class="text-small text-danger"></div>') ?>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>

        </form>
        </div>
    </div>

        
</div>
             

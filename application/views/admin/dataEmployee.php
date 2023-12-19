<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <?php echo $this->session->flashdata('message') ?>

    <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?php echo base_url('admin/dataEmployee/addData') ?>"><i class="fas fa-plus"></i> Add Employee</a>

    <table class="table table-striped table-bordered">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Name Employee</th>
            <th class="text-center">Gender</th>
            <th class="text-center">Position</th>
            <th class="text-center">Date Join</th>
            <th class="text-center">Status</th>
            <th class="text-center">Photo</th>
            <th class="text-center">Action Rights</th>
            <th class="text-center">Action</th>
        </tr>

        <?php $no=1; foreach($employees as $e): ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $e->nik ?></td>
            <td><?php echo $e->name_employee ?></td>
            <td><?php echo $e->gender ?></td>
            <td><?php echo $e->position ?></td>
            <td><?php echo $e->date_join ?></td>
            <td><?php echo $e->status ?></td>
            <td><img src="<?php echo base_url().'assets/photo/'.$e->photo ?>" width="75px"></td>
            <td><?php echo $e->access_rights ?></td>
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataEmployee/updateData/'.$e->id_employee) ?>"><i class="fas fa-edit"></i></a> 
                    <a onclick="return confirm('Yakin akan dihapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataEmployee/deleteData/'.$e->id_employee) ?>"><i class="fas fa-trash"></i></a> 
                </center>
            </td>
        </tr>
        <?php endforeach ?>
    </table> 
</div>
             

<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/dataPosition/add_data') ?>"><i class="fas fa-plus"></i>Add Data</a> 

    <table class="table table-bordered table-striped">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Name Position</th>
            <th class="text-center">Basic Salary</th>
            <th class="text-center">Transport Allowance</th>
            <th class="text-center">Meal Allowance</th>
            <th class="text-center">Total</th>
            <th class="text-center">Action</th>
        </tr>

        <?php $no=1; foreach($position as $p) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $p->name_position ?></td>
            <td>Rp. <?php echo number_format($p->basic_salary,0,',','.') ?></td>
            <td>Rp. <?php echo number_format($p->transport_allowance,0,',','.') ?></td>
            <td>Rp. <?php echo number_format($p->meal_allowance,0,',','.') ?></td>
            <td>Rp. <?php echo number_format($p->basic_salary + $p->transport_allowance + $p->meal_allowance,0,',','.') ?></td>
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataPosition/update_data/$j->id_position') ?>"><i class="fas fa-edit"></i></a> 
                    <a onclick="return confirm('Yakin akan dihapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataPosition/delete_data/$j->id_position') ?>"><i class="fas fa-trash"></i></a> 
                </center>
            </td>
        </tr>
            <?php endforeach; ?>
    </table>

        
</div>
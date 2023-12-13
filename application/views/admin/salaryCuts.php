<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <?php echo $this->session->flashdata('message') ?>

    <a class="btn btn-sm btn-success mb-2 mt-2" href="<?php echo base_url('admin/salaryCuts/addData') ?>">
        <i class="fas fa-plus"></i> Add Data</a>

    <table class="table table-borderd table-striped">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Piece</th>
            <th class="text-center">Number Of Pieces</th>
            <th class="text-center">Action</th>
        </tr>

        <?php $no=1; foreach($salary_cuts as $s) : ?>
            <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $s->piece ?></td>
            <td>Rp. <?php echo number_format($s->number_of_pieces, 0, ', ', '.') ?></td>
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/salaryCuts/updateData/'.$s->id) ?>">
                    <i class="fas fa-edit"></i></a>
                    <a onclick="return confirm('Are you sure it will be deleted?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/salaryCuts/deleteData/'.$s->id) ?>">
                    <i class="fas fa-trash"></i></a>
                </center>
            </td>
            </tr>
        <?php endforeach?>
    </table>

        
</div>
             

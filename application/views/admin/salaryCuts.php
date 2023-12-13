<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <?php echo $this->session->flashdata('message') ?>

    <a class="btn btn-sm btn-success mb-2 mt-2" href="<?php echo base_url('admin/salaryCuts/addData') ?>">
        <i class="fas fa-plus"></i> Add Data</a>

        
</div>
             

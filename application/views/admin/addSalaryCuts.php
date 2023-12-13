<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 65%">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/salaryCuts/addDataAction') ?>">

            <div class="form-group">
                <label>Piece</label>
                <input type="text" name="piece" class="form-control">
                <?php echo form_error('piece') ?>
            </div>
            <div class="form-group">
                <label>Number Of Pieces</label>
                <input type="text" name="number_of_pieces" class="form-control">
                <?php echo form_error('number_of_pieces') ?>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            </form>

            
        </div>
    </div>

        
</div>
             

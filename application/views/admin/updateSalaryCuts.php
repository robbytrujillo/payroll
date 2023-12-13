<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 65%">
        <div class="card-body">

        <?php foreach ($salary_cuts as $s): ?>
            <form method="POST" action="<?php echo base_url('admin/salaryCuts/updateDataAction') ?>">

            <div class="form-group">
                <label>Piece</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $s->id ?>">
                <input type="text" name="piece" class="form-control" value="<?php echo $s->piece ?>">
                <?php echo form_error('piece') ?>
            </div>
            <div class="form-group">
                <label>Number Of Pieces</label>
                <input type="text" name="number_of_pieces" class="form-control" value="<?php echo $s->number_of_pieces ?>">
                <?php echo form_error('number_of_pieces') ?>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <?php endforeach; ?>
            
        </div>
    </div>

        
</div>
             

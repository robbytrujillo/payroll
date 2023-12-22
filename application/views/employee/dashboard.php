<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="alert alert-success font-weight-bold mb-4" style="width: 65%">
        Welcome, you have logged in as an employee!
    </div>       

    <div class="card" style="margin-bottom: 120px; width: 65%">
        <div class="card-header font-weight-bold bg-success text-white">
            Data Employee
        </div>

        <?php foreach($employee as $e) : ?>
        <div class="card-body">
        <div class="row">
            <div class="col-md-5">
                <img style="width: 250px" src="<?php echo base_url('assets/photo/'.$e->photo) ?>">
            </div>

            <div class="col-md-7">
                <table class="table">
                    <tr>
                        <td>Name Employee</td>
                        <td>:</td>
                        <td><?php echo $e->name_employee ?></td>
                    </tr>
                    <tr>
                        <td>Position</td>
                        <td>:</td>
                        <td><?php echo $e->position ?></td>
                    </tr>
                    <tr>
                        <td>Date Join</td>
                        <td>:</td>
                        <td><?php echo $e->date_join ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td><?php echo $e->status ?></td>
                    </tr>
                </table>
            </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

        
</div>
             

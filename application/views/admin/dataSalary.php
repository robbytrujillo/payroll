<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
        Filter Data Employee Salary
        </div>
    <div class="card-body">
    <form class="form-inline">
        <div class="form-group mb-2">
        <label for="staticEmail2">month: </label>
        <select class="form-control ml-2" name="month">
            <option value="">--Choose month--</option>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
        </div>
        
        <div class="form-group mb-2 ml-5">
        <label for="staticEmail2">Year: </label>
        <select class="form-control ml-2" name="year">
            <option value="">--Choose Year--</option>
            <?php $year = date('Y');
            for ($i=2020;$i<$year+5;$i++) {
            ?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php } ?>
        </select>
        </div>

    <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Show Data</button>
    <a href="" class="btn btn-success mb-2 ml-3"><i class="fas fa-print"></i> Print Payroll</a>
    </form>
    </div>
</div>

<?php 
    if ((isset($_GET['month']) && $_GET['month']!='') && (isset($_GET['year']) && $_GET['year']!='')) {
        $month = $_GET['month'];
        $year = $_GET['year'];
        $monthyear = $month.$year;
    } else {
        $month = date('m');
        $year = date('Y');
        $monthyear = $month.$year;
    }

?>

<div class="alert alert-info">
Displays Employee Salary Data For The month: <span class="font-weight-bold"><?php echo $month ?></span> Year: <span class="font-weight-bold"><?php echo $year ?>         
</div>

<?php

$sum_data = count($salary);
if ($sum_data > 0) {

?>

<div class="table-responsive">
    <table class="table table bordered table-striped">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Name Employee</th>
            <th class="text-center">Gender</th>
            <th class="text-center">Position</th>
            <th class="text-center">Basic Salary</th>
            <th class="text-center">Transport Allowance</th>
            <th class="text-center">Meal Allowance</th>
            <th class="text-center">Salary Cuts</th>
            <th class="text-center">Total Salary</th>
        </tr>

        <?php foreach ($piece as $p) {
            $alpha = $p->number_of_pieces;  
        }
        ?>

        <?php $no=1; foreach($salary as $s) : ?>

        <?php $piece = $s->alpha * $alpha ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $s->nik ?></td>
            <td><?php echo $s->name_employee ?></td>
            <td><?php echo $s->gender ?></td>
            <td><?php echo $s->name_position ?></td>
            <td>Rp.<?php echo number_format($s->basic_salary,0, ',','.') ?></td>
            <td>Rp.<?php echo number_format($s->transport_allowance,0, ',', '.') ?></td>
            <td>Rp.<?php echo number_format($s->meal_allowance,0, ',','.') ?></td>
            <td>Rp.<?php echo number_format($piece,0, ',','.') ?></td>
            <td>Rp.<?php echo number_format($s->basic_salary + $s->transport_allowance + $s->meal_allowance - $piece,0, ',','.') ?></td>
        </tr>

        <?php endforeach ?>
    </table>
</div>

<?php } else { ?>
    <span class="badge badge-danger"><i class="fas fa-info-circle">The attendance data is still empty, please input presence data for the month and year you choose!!</i></span>
<?php } ?>
        
</div>
             

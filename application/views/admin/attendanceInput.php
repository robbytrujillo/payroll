<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
        Attendace Data Input
        </div>
    <div class="card-body">
    <form class="form-inline">
        <div class="form-group mb-2">
        <label for="staticEmail2">Month: </label>
        <select class="form-control ml-2" name="month">
            <option value="">--Choose Month--</option>
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

    <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Generate</button>
    
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
Displays Employee Attendance Data For The Month: <span class="font-weight-bold"><?php echo $month ?></span> Year: <span class="font-weight-bold"><?php echo $year ?>         
</div>
<form method="POST">
<button class="btn btn-success mb-3" type="submit" name="submit" value="submit">Save</button>

<table class="table table-bordered table-stripes">
    <tr>
        <td class="text-center">No</td>
        <td class="text-center">NIK</td>
        <td class="text-center">Name Employee</td>
        <td class="text-center">Gender</td>
        <td class="text-center">Position</td>
        <td class="text-center" width="8%">Attendace</td>
        <td class="text-center" width="8%">Sick</td>
        <td class="text-center" width="8%">Alpha</td>
    </tr>

    <?php $no=1; foreach($attendaces_input as $a) : ?>
        <tr>
            <input type="hidden" name="month[]" class="form-control" value="<?php echo $monthyear ?>">
            <input type="hidden" name="nik[]" class="form-control" value="<?php echo $a->nik ?>">
            <input type="hidden" name="name_employee[]" class="form-control" value="<?php echo $a->name_employee ?>">
            <input type="hidden" name="gender[]" class="form-control" value="<?php echo $a->gender ?>">
            <input type="hidden" name="name_position[]" class="form-control" value="<?php echo $a->name_position ?>">

            <td><?php echo $no++ ?></td>
            <td><?php echo $a->nik ?></td>
            <td><?php echo $a->name_employee ?></td>
            <td><?php echo $a->gender ?></td>
            <td><?php echo $a->position ?></td>
            <td><input type="number" name="total_attendance[]" class="form-control" value="0"></td>
            <td><input type="number" name="sick[]" class="form-control" value="0"></td>
            <td><input type="number" name="alpha[]" class="form-control" value="0"></td>
        </tr>
    <?php endforeach; ?>
</table><br><br><br><br>
    </form>

</div>
             

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php  echo $title ?></title>
    <style type="text/css">
        body{
            font-family: Arial;
            color: black;
        }
    </style>
</head>
<body>
    <center>
        <h1>IBNU HAJAR BOARDING SCHOOL</h1>
        <h2>Employee Payroll List</h2>
    </center>

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
    
    <table>
        <tr>
            <td>Month</td>
            <td>:</td>
            <td><?php echo $month ?></td>
        </tr>
        <tr>
            <td>Year</td>
            <td>:</td>
            <td><?php echo $year ?></td>
        </tr>
    </table>

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

        <?php $no=1; foreach($printSalary as $p) : ?>

        <?php $piece = $p->alpha * $alpha ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $p->nik ?></td>
            <td><?php echo $p->name_employee ?></td>
            <td><?php echo $p->gender ?></td>
            <td><?php echo $p->name_position ?></td>
            <td>Rp.<?php echo number_format($p->basic_salary,0, ',','.') ?></td>
            <td>Rp.<?php echo number_format($p->transport_allowance,0, ',', '.') ?></td>
            <td>Rp.<?php echo number_format($p->meal_allowance,0, ',','.') ?></td>
            <td>Rp.<?php echo number_format($piece,0, ',','.') ?></td>
            <td>Rp.<?php echo number_format($p->basic_salary + $p->transport_allowance + $p->meal_allowance - $piece,0, ',','.') ?></td>
        </tr>

        <?php endforeach ?>
    </table>

    <table width="100%">
        <tr>
            <td></td>
            <td width="200px">
                <p>Bandung, <?php echo  date("d M Y") ?><br> Finance</p>
                <br>
                <br>
                <p>_______________________</p>
            </td>
        </tr>
    </table>


</body>
</html>

<script type="text/javascript">
    window.print();
</script>
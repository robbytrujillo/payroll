<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title ?></title>
    <style type="text/css">
        body {
            font-size: Arial;
            color: black;
        }
    </style>
</head>
<body>
    <center>
        <h1>IHBS</h1>
        <h2>Employee Salary Slip</h2>
        <hr style="width: 50%; border-width: 5px; color: black;">


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

    <?php foreach($salary_cut as $s) {
        $salary_cut = $s->number_of_pieces;
    } ?>

    <?php foreach($print_slip as $ps) : ?>

    <?php $var_salary_cut = $ps->alpha * $salary_cut ?>

    <table style="width: 100%">
        <tr>
            <td width="20%">Name Employee</td>
            <td width="2%">:</td>
            <td><?php echo $ps->name_employee ?></td>
        </tr>
        
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><?php echo $ps->nik ?></td>
        </tr>
        
        <tr>
            <td>Position</td>
            <td>:</td>
            <td><?php echo $ps->name_position ?></td>
        </tr>
        
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

    <table class="table table-striped table-bordered mt-3">
        <tr>
            <th class="text-center" width="5%">No</th>
            <th class="text-center">Explanation</th>
            <th class="text-center">Amount</th>
        </tr>

        <tr>
            <td>1</td>
            <td>Basic Salary</td>
            <td>Rp. <?php echo number_format($ps->basic_salary,0,',','.') ?></td>
        </tr>
        
        <tr>
            <td>2</td>
            <td>Transport Allowance</td>
            <td>Rp. <?php echo number_format($ps->transport_allowance,0,',','.') ?></td>
        </tr>
        
        <tr>
            <td>3</td>
            <td>Meal Allowance</td>
            <td>Rp. <?php echo number_format($ps->meal_allowance,0,',','.') ?></td>
        </tr>

        <tr>
            <td>4</td>
            <td>Salary Cuts</td>
            <td>Rp. <?php echo number_format($var_salary_cut,0,',','.') ?></td>
        </tr>
        
        <tr>
            <th colspan="2" style="text-align: right">Salary Total</th>
            <th>Rp. <?php echo number_format($ps->basic_salary + $ps->transport_allowance + $ps->meal_allowance - $var_salary_cut,0,',','.') ?></th>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td></td>
            <td>
                <p>Employee</p>
                <br>
                <br>
                <p class="font-weight-bold"><?php echo $ps->name_employee ?></p>
            </td>


            <td width="200px">
                <p>Jakarta, <?php echo date("d M Y") ?> <br> Finance,</p>
                <br>
                <br>
                <p>_________________________</p>
            </td>

        </tr>
    </table>

    <?php endforeach; ?>
    
</body>
</html>

<script type="text/javascript">
    window.print();
</script>
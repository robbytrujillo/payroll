<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style type="text/css">
        body {
            font-family: Arial;
            color: black;
        }
    </style>
</head>
<body>
    <center>
        <h1>IBNU HAJAR BOARDING SCHOOL</h1>
        <h2>Employee Attendace Report</h2>
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

    <table class="table table-borderd table-striped">
        <tr>
            <th>No</th>
            <th>Name Employee</th>
            <th>NIK</th>
            <th>Position</th>
            <th>Total Attendance</th>
            <th>Sick</th>
            <th>Alpha</th>
        </tr>

        <?php $no=1; foreach($attendanceReport as $a) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $a->name_employee ?></td>
            <td><?php echo $a->nik ?></td>
            <td><?php echo $a->name_position ?></td>
            <td><?php echo $a->total_attendance ?></td>
            <td><?php echo $a->sick ?></td>
            <td><?php echo $a->alpha ?></td>
        </tr>
        <?php endforeach ?>
        
    </table>
</body>
</html>

<script type="text/javascript">
    window.print()
</script>
<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <table class="table table-striped table-bordered">
        <tr>
            <th>Month/Year</th>
            <th>Basic Salary</th>
            <th>Transport Allwance</th>
            <th>Meal Allwance</th>
            <th>Salary Cuts</th>
            <th>Salary Total</th>
            <th>Print Slip</th>
        </tr>

        <?php foreach($salary_cut1 as $sc) : ?>
        <?php $salary_cut1 = $sc->number_of_pieces; ?>
        <?php endforeach; ?>

        <?php foreach($salary as $s) : ?>
        <?php $sal_cut = $s->alpha * $salary_cut1 ?>
        <tr>
            <td><?php echo $s->month ?></td>
            <td>Rp. <?php echo number_format($s->basic_salary,0,',','.') ?>
            <td>Rp. <?php echo number_format($s->transport_allowance,0,',','.') ?>
            <td>Rp. <?php echo number_format($s->meal_allowance,0,',','.') ?>
            <td>Rp. <?php echo number_format($sal_cut,0,',','.') ?>
            <td>Rp. <?php echo number_format($s->basic_salary + $s->transport_allowance + $s->meal_allowance - $sal_cut,0,',','.') ?>
            <td><center>
                <a class="btn btn-sm btn-success" href="<?php echo base_url('employee/dataSalary/printSlip/'.$s->id_attendance) ?>"><i class="fas fa-print"></i></a>
            </center></td>
        </tr>
        <?php endforeach; ?>                                                  
    </table>

</div>
             

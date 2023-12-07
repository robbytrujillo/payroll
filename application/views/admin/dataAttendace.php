<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
        Filter Data Attendace
        </div>
    <div class="card-body">
    <form class="form-inline">
        <div class="form-group mb-2">
        <label for="staticEmail2">Month: </label>
        <select class="form-control" name="month">
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
        
        <div class="form-group mb-2">
        <label for="staticEmail2">Year: </label>
        <select class="form-control" name="year">
            <option value="">--Choose Year--</option>
            <?php $year = date('Y');
            for ($i=2020;$i<$year+5;$i++) {
            ?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php } ?>
        </select>
        </div>
    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
    </form>
    </div>
</div>

        
</div>
             

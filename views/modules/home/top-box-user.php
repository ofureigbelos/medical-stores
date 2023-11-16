<?php

$item  = null;
$value = null;

$stock =  ControllerStocks::ctrShowStock($item, $value);
$totalStock = count($stock);


$contractors = ControllerContractors::ctrShowContractor($item, $value);
$totalContractor = count($contractors);


$dispense = ControllerDispense::ctrShowDispenseLog($item, $value);
$totalDispensed = count($dispense);

$intake = ControllerBinCard::ctrShowBincards($item, $value);
$totalIntake = count($intake);

?>


    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $totalDispensed; ?><sup style="font-size: 20px"></sup></h3>

                <p>Total Dispensed</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner"><h3><?php echo $totalStock; ?></h3>
                <p>Total Store Item</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="stocks" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $totalContractor; ?></h3>

                <p>Total Suppliers</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="contractors" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $totalIntake; ?><sup style="font-size: 20px"></sup></h3>

                <p>Total Received</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

      </div>
    </section>
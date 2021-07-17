<?php
$this->load->view('template/seller/header');
// $data['row'] = $qurey->row();
$row = $row->row();
?>
<script>
google.charts.load('current', {
    packages: ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    // Define the chart to be drawn.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Element');
    data.addColumn('number', 'Percentage');
    data.addRows([
        ['Cab', <?php echo  $cab->num_rows() ?>],
        ['Rooms', <?php echo  $rooms->num_rows()  ?>],
        ['Hotel', <?php echo  $hotel->num_rows() ?>]
    ]);

    // Instantiate and draw the chart.
    var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
    chart.draw(data, null);
}
</script>
<div class="dashboard-wrapper">
    <div class="influence-profile">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h3 class="mb-2">User Profile </h3>
                        <div class="page-breadcrumb">

                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- content -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- ============================================================== -->
                <!-- profile -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                    <!-- ============================================================== -->
                    <!-- card profile -->
                    <!-- ============================================================== -->
                    <div class="card">
                        <div class="card-body">
                            <div class="user-avatar text-center d-block">
                                <img src="<?php
                                 echo base_url('uploads/sellerdetails/').$row->profile
                                ?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                            </div>
                            <div class="text-center">
                                <h2 class="font-24 mb-0">
                                    <?php echo ucwords($row->fullname); ?>
                                </h2>
                                <p>Travel Seller</p>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <h3 class="font-16">Contact Information</h3>
                            <div class="">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i>
                                        <?php echo $row->email;?>
                                    </li>
                                    <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i>
                                        <?php echo $row->number;?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end card profile -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- end profile -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- campaign data -->
                <!-- ============================================================== -->
                <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
                    <!-- ============================================================== -->

                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Total Rooms</h5>
                                <div class="card-body">
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?php  echo $rooms->num_rows() ; ?></h1>
                                    </div>
                                </div>
                                <div class="card-footer text-center bg-white">
                                    <a href="<?php echo base_url('VendrRooms/RoomsData');?>" class="card-link">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Total Hotels</h5>
                                <div class="card-body">
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?php  echo $hotel->num_rows() ; ?></h1>
                                    </div>
                                </div>
                                <div class="card-footer text-center bg-white">
                                    <a href="<?php echo base_url('Seller/hoteldata') ?>" class="card-link">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Total Cabs</h5>
                                <div class="card-body">
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?php  echo $cab->num_rows(); ?></h1>
                                    </div>
                                </div>
                                <div class="card-footer text-center bg-white">
                                    <a href="<?php echo base_url('Seller/totaldata') ?>" class="card-link">View
                                        Details</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- ============================================================== -->
                    <!-- end revenue year  -->
                    <!-- ============================================================== -->
                    <div class="container" id="myPieChart">

                        </id=>
                        <!-- end campaign tab one -->
                        <!-- ============================================================== -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- end campaign data -->
                    <!-- ============================================================== -->
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end content -->
        <?php
$this->load->view('template/seller/footer')
?>
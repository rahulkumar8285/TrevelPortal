<?php
$this->load->view('template/admin/header');
// print_r($hotel->row());
// die();
?>
<!DOCTYPE html>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>All Cabs Datatable</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li> -->
                        <a href="<?php echo base_url().'AdminLogin/Logout'?>">Logout</a>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <!-- <div class="card-header">
                Seller Datatable
            </div> -->
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Hotel ID</th>
                            <th>Hotel Name</th>
                            <th>Contact Number</th>
                            <th>Landmark</th>
                            <th>City</th>
                            <th>Zip Code</th>
                            <th>Seller Id</th>
                            <th>View</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach ($hotel->result() as $row):?>
                        <tr>
                            <td><?php echo $row->hid ; ?></td>
                            <td><?php echo $row->hotelname ; ?></td>
                            <td><?php echo $row->hotelconnum ; ?></td>
                            <td><?php echo $row->nearlandmark ; ?></td>
                            <td><?php echo $row->city ;?></td>
                            <td><?php echo $row->zip ;?></td>
                            <td><?php echo $row->sellerid ;?></td>
                            <td>
                                <a href="<?php echo  base_url('Home/hotelsingle/').$row->hid; ?> " target="_blank">
                                    check->
                                </a>
                            </td>
                        </tr>
                        <?php 
                            endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
<!------model------>
<div class="modal fade" id="activeacountmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Seller
                    Request
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Add this seller To Travel Potal packag
                    Person send a mail to user and than user login
                    add package total chareges 30% off month Selling ..
                    are you sure to add this person And send Mail to seller
                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <form action="<?php echo base_url('AdminLogin/status');?>" method="POST" id="form-delete-user">
                    <input type="hidden" name="deleteid" value="">
                    <input type="submit" class="btn btn-primary ml-1" value="Active">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    </input>
                </form>
            </div>

        </div>
    </div>
</div>
<!--------------model---close--->
<!-----deactiveac----->
<div class="modal fade" id="deactivemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Seller
                    Request
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Deactive This Acount
                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <form action="<?php echo base_url('AdminLogin/status');?>" method="POST" id="deactiveform">
                    <input type="hidden" name="deleteid" value="">
                    <input type="submit" class="btn btn-primary ml-1" value="Deactive">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    </input>
                </form>
            </div>

        </div>
    </div>
</div>
<!----------model-----close---->


<?php
$this->load->view('template/admin/footer')
?>